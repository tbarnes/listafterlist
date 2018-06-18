<?php
require_once '../loader.php';
get_header('Member Area');
if (_logged_in()){
    $user = get_user();
}

if(!empty($_POST)) {
    if(isset($_POST['task']) && $_POST['task'] == 'newListFromMemberPanel') {
        //security!!! AHHH!!!
        ensure_login();
        csrf_check();
        
        // Validate the biiiitch
        //$v = new Validator;
        //
        //$rules = array(
        //    'list_title'        => array('required', 'max:128'),
        //    'list_description'  => array('required', 'max:2000'),
        //    'list_category'     => array('required'),
        //    'list_body'         => array('required')
        //);
        //
        //$v->make($_POST, $rules);
        //
        //if ($v->fails()) {
        //    Flash::make('danger', GENERIC_FORM_ERROR_MESSAGE);
        //    redirect('lists/submit.php');
        //}
        
        //all looks good, let's prepare to add to the DB
        
        //start with handling the list image
        if ($_FILES['custom_image']['name']) {
            // We have an image perform the update.
            try {
                $result = ImageUploader::upload($_FILES['custom_image']);
            } catch (Exception $e) {
                Flash::make('danger', $e->getMessage());
                redirect('lists/submit.php');
            }
    
            $image = $result;
        }
        
        $title = strip_tags($_POST['list_title']);
        $description = strip_tags($_POST['list_description']);
        $body = $_POST['list_body'];
        $category = $_POST['list_category'];
        $attribution = '';
        $image = '';
        if (!empty($_POST['list_attribution'])) {
            $attribution = $_POST['list_attribution'];
        }
        
        $result = DB::table('list')->insert(array(
                'user_id'       => $user->id,
                'created_at'    => date(DATABASE_DATETIME_FORMAT),
                'category_id'   => (int)$category,
                'title'         => $title,
                'description'   => $description,
                'body'          => $body,
                'image'         => $image,
                'attribution'   => $attribution
        ));
        
        if ($result) {
            // Success!
            Flash::make('success', 'Heyyoooooo! Your list is published!');
            redirect('lists/submit.php');
        }
    }
}


$categories = get_list_categories();
?>
<div class="list-banner submit">
    <h1>Submit a List - In Under 60 Seconds</h1>
</div>

  <?php if ( $message = Flash::show() ): ?>
    <div class="alert alert-<?=$message['type']?>">
      <?=$message['msg']?>
    </div><!--alert-->
  <?php endif; ?>

  <div class="row">
    <div class="container main">
      <div class="col-lg-10 col-md-offset-1">
        <div class="creation-form">
          <div class="creation-form-inner">
            <?php if (!_logged_in()): ?>
              <div class="field account-sign-in">
                <a class="button btn-primary" href="<?=root_path('login.php')?>">Sign in</a>
                You aren't currently logged-into <?=system_name()?>. Please login or <a href="<?=root_path('register.php')?>">register</a> to continue.
              </div>
            <?php endif; ?>
            <form action="" method="POST" id="new-list">
              <input type="hidden" name="task" value="newListFromMemberPanel">
              <input type="hidden" name="csrf" value="<?=get_csrf_token()?>">

              <div class="form-group">
                <label for="list_title">List Title</label>
                <input type="text" name="list_title" id="list_title" placeholder="My List Title...." />
              </div>

              <div class="form-group">
                <label for="list_description">List Description</label>
                <textarea type="text" name="list_description" id="list_description" placeholder="My List Description...."></textarea>
              </div>

              <?php //if(!empty($categories)): ?>
                <div class="form-group">
                  <label for="list_category">List Category</label>
                  <select id="list_category" name="list_category">
                    <?php foreach($categories as $category): ?>
                        <option value="<?=$category->id?>"><?=ucfirst($category->name)?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <?php //endif; ?>
              
                <div class="form-group">
                    <label for="custom_image" class="control-label">List Cover Image</label>
                    <input type="file" id="custom_image" name="custom_image">
                </div>

              <div class="form-group">
                <label for="list_body">Add Yo List!</label>
                <textarea type="text" name="list_body" id="summernote" placeholder="My Awesome List...."></textarea>
              </div>
              
              <div class="form-group">
                <label for="list_attribution">Want to Add an Attribution?</label>
                <input type="text" name="list_attribution" id="list_attribution" placeholder="Give credit where it's due!...." />
              </div>
              
              <div class="form-group" col-md-6 pull-right>
                <input type="submit" class="btn btn-primary" value="Publish!" />
              </div>

            </form>
          </div>
          <div class="clear"></div>
        </div>

      </div><!--//.col-lg-10-->

    </div><!--//.container-->
  </div><!--//.row-->

  <?=get_footer()?>
