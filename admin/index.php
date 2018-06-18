<?php
require_once '../loader.php';
get_header('Admin Panel');

// Make sure that we have a user logged in
// before they can view this page.
ensure_login();
// Now grab the logged in user
$user = get_user();
// Check to see if the user has access to this section of the website.
check_user_access($user, 'accessAdminPanel', array('redirect' => 'member/'));

?>
<body>
  <?=get_menu('home')?>

  <div class="row">
    <div class="container main">
      <div class="col-lg-3">
        <?=get_admin_sidebar('admin-home')?>
      </div><!--//.col-lg-3-->

      <div class="col-lg-9">

        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#admin-home-panel" data-toggle="tab">Admin Home Panel</a></li>
        </ul>

        <div class="tab-content">

          <div class="active tab-pane" id="admin-home-panel">
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong>Welcome back, <?=$user->username?></strong>
              </div><!--//panel-heading-->
              <div class="panel-body">
                <p>Welcome to the <strong class="text-danger">Administrator</strong> panel. To navigate around the
                application use the menu to <strong class="text-success">left</strong>.</p>
              </div><!--//panel-body-->
            </div><!--//panel panel-default-->

          </div><!--//active tab-pane-->

          </div><!--//active tab-pane-->

        </div><!--//tab-content-->

      </div><!--//.col-log-9-->

    </div><!--//.container-->
  </div><!--//.row-->

  <?=get_footer()?>
</body>
</html>
