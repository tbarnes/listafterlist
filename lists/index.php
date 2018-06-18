<?php
require_once '../loader.php';
get_header('Lists');

if(empty($_GET)) {
    redirect('index.php');
}

$list = Lists::getListById($_GET['list_id']);
$category = Lists::getListCategoryById($list->category_id);
$author = User::findById($list->user_id);

?>
<div class="list-banner list-detail" style="background-image: url('<?=uploads_path($list->image)?>');">
    <div class="list-details container">
        <div class="row">
            <div class="col-md-6">
                <h4><?=$list->title?></h4>
                <p class="description"><?=$list->description?></p>
                <p class="meta"><i class="fa fa-tags"></i> <?=Ucwords($category->name)?> <i class="fa fa-calendar-o"></i> <?=date(TIME_FORMAT,strtotime($list->created_at))?></p>
            </div>
            <div class="col-md-3 col-md-offset-3" style="padding-top:125px;">
                <a href="#share_modal" data-toggle="modal" data-title="Share <?=$list->title?>" class="btn btn-large btn-primary btn-share">Share List</a>
            </div>
        </div>
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

<div class="row">
  <div class="container main">
    <div class="col-lg-9">
      <div class="creation-form">
        <div class="creation-form-inner" style="padding-top:1em;">
          <h1 class="container-header"><i class="fa fa-list"></i> <?=$list->title?></h1>
          <?=$list->body?>
        </div>
      </div> <!--//list-body-->
      <div class="creation-form" style="margin-top:25px;">
        <div class="creation-form-inner" style="padding-top:1em;">
          <h1 class="container-header"><i class="fa fa-user"></i> About the Author</h1>
          <img src="<?=get_gravatar($author->email)?>" class="author-avatar" />
          <span class="author-name"><?=fullname($author)?></span><br>
          <span class="author-meta"><i class="fa fa-map-marker"></i> <?=$author->location?></span><br>
          <span class="author-bio"><?=$author->bio?></span>
        </div>
        <div class="clear"></div>
      </div> <!--//author info-->
    </div><!--//.col-lg-9-->
    
    <div class="col-lg-3">
        <!--Google Ad-->
        <div  class="ad-container-nopad">
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
        <!--Amazon Ad-->
        <div class="ad-container">
            <SCRIPT charset="utf-8" type="text/javascript" src="http://ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Flistafterlist-20%2F8006%2Fb1603203-ffbe-4996-bb18-767f996c0b44"> </SCRIPT> <NOSCRIPT><A HREF="http://ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Flistafterlist-20%2F8006%2Fb1603203-ffbe-4996-bb18-767f996c0b44&Operation=NoScript">Amazon.com Widgets</A></NOSCRIPT>
        </div>
        <!--FB Page-->
        <div class="fb-page ad-container" data-width="300" data-height="200" data-href="https://www.facebook.com/listafterlist/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false" style="margin-bottom:30px;">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/listafterlist/">
                    <a href="https://www.facebook.com/listafterlist/">ListAfterList</a>
                </blockquote>
            </div>
        </div>
    </div><!--//col-lg-3-->

  </div><!--//.container-->
</div><!--//.row-->

<div class="clear"></div>

<!-- Bottom Banner Ad -->
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
      <div class="modal fade" id="share_modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Share <?=$list->title?></h4>
          </div>
          <div class="modal-body">
            <div class="share-buttons">
                <a href="http://www.facebook.com/sharer/sharer.php?u=<?=root_path('lists/index.php?list_id='.$list->id)?>" target="_blank" class="social-share facebook">Share via Facebook</a>
                <a href="https://twitter.com/intent/tweet?url=<?=root_path('lists/index.php?list_id='.$list->id)?>" target="_blank" class="social-share twitter">Share via Twitter</a>
                <a href="https://plus.google.com/share?url=<?=root_path('lists/index.php?list_id='.$list->id)?>" target="_blank" class="social-share google">Share via Google</a>
            </div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
