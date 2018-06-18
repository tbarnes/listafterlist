<?php
require_once 'loader.php';

get_header('Home');

$lists = grab_lists();
$categories = get_list_categories();

if(!empty($_POST)) {
    if ((isset($_POST['task']) && $_POST['task'] == 'search')) {
        $searchTerm = strip_tags(trim($_POST['listSearch']));

        // Make sure it's worth searching for
        if (strlen($searchTerm) < 3) {
          Flash::make('danger', SEARCH_TERM_TOO_SHORT);
          redirect('index.php');
        }
      
        $lists = DB::table('list')->like('title', $searchTerm)->get();
      
        if (empty($lists)) {
          Flash::make('info', _rd('term', $searchTerm, SEARCH_FOUND_NO_RESULTS));
          redirect('index.php');
      
        }
        
    }
}

?>
    <!-- Top Banner -->
    <div class="list-banner home">
        <h1>Welcome to ListAfterList!</h1>
        <p>A social community centered around making insightful lists for business and for life</p>
        <div class="search-container">
            <form action="" method="post" class="search-form">
                <input type="hidden" name="task" value="search">
                <input type="hidden" name="csrf" value="<?=get_csrf_token()?>">
                <div class="input">
                    <input id="listSearch" name="listSearch" type="text" placeholder="Search our lists..." />
                </div>
                <div class="input">
                    <input type="submit" class="btn-primary" value="Find Lists" />
                </div>
            </form>
        </div>
    </div>
    
  <!-- Top Banner Ad -->
  <div class="row">
    <div class="col-md-12 ad-container text-center">
        <script type="text/javascript">
                google_ad_client = "pub-2998315050677941";
                google_ad_width = 728;
                google_ad_height = 90;
                google_ad_format = "728x90_as";
                google_ad_type = "image";
                google_color_border = "#FFFFFF";
                google_color_bg = "#FFFFFF";
                google_color_link = "#0000FF";
                google_color_text = "#000000";
                google_color_url = "#008000";
        </script>
       <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    </div>
  </div>
  <!--// Top Banner Ad -->
  
    <div class="container">
        
        <div class="separator">
            <p><?=mysql_num_rows($lists->id)?> results found</p>
        </div>
    
        <div class="row">
            <div class="col-md-9">
                <?php if(!empty($lists)): ?>
                    <?php foreach($lists as $list): ?>
                        <div class="col-md-6 list-preview">
                          <div class="list-main">
                            <h2>
                                <a href="<?=root_path('lists/index.php?list_id='.$list->id)?>">
                                    <?=substr($list->title,0,40).'...'?>
                                </a>
                            </h2>
                            <p><?=substr($list->description, 0, 100).'...'?></p>
                          </div>
                          <div class="list-footer">
                            <a href="<?=root_path('lists/index.php?list_id='.$list->id)?>" class="btn btn-sm btn-primary pull-right">View List &raquo;</a>
                            <div class="rating">
                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                            </div>
                            <div class="clear"></div>
                          </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="col-md-3">
              
              <div class="ad-container">
                  <script type="text/javascript">
                      google_ad_client = "pub-2998315050677941";
                      google_ad_width = 300;
                      google_ad_height = 250;
                      google_ad_format = "300x250_as";
                      google_ad_type = "image";
                      google_color_border = "#FFFFFF";
                      google_color_bg = "#FFFFFF";
                      google_color_link = "#0000FF";
                      google_color_text = "#000000";
                      google_color_url = "#008000";
                  </script>
                  <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
              </div>
              <div class="fb-page ad-container" data-width="300" data-height="200" data-href="https://www.facebook.com/listafterlist/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false" style="margin-bottom:30px;">
                  <div class="fb-xfbml-parse-ignore">
                      <blockquote cite="https://www.facebook.com/listafterlist/">
                          <a href="https://www.facebook.com/listafterlist/">ListAfterList</a>
                      </blockquote>
                  </div>
              </div>
            </div><!--//sidebar-->

        </div><!--//row-->

    </div><!--container-->
  
    <!-- Top Banner Ad -->
    <div class="row">
      <div class="col-md-12 ad-container text-center">
        <script type="text/javascript">
                google_ad_client = "pub-2998315050677941";
                google_ad_width = 728;
                google_ad_height = 90;
                google_ad_format = "728x90_as";
                google_ad_type = "image";
                google_color_border = "#FFFFFF";
                google_color_bg = "#FFFFFF";
                google_color_link = "#0000FF";
                google_color_text = "#000000";
                google_color_url = "#008000";
        </script>
        <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
      </div>
    </div>
    <!--// Top Banner Ad -->

  <?=get_footer()?>