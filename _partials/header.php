<?php ob_start(); // Fixed made by KRauer ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> <?=$title?> &raquo; <?=system_name()?> </title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Stylesheets -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?=stylesheets_path('bootstrap-glyphicons')?>">
  <link rel="stylesheet" href="<?=stylesheets_path('bootstrap')?>">
  <link rel="stylesheet" href="<?=stylesheets_path('font-awesome')?>">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=stylesheets_path('style')?>">

  <!-- Meta Information -->
  <meta name="description" content="<?=meta_description()?>">
  <meta name="author" content="<?=meta_author()?>">
  
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=273097946069628";
            fjs.parentNode.insertBefore(js, fjs);
        }
        (document, 'script', 'facebook-jssdk'));
    </script>

</head>
<body>
    <?=get_menu('home')?>
    
    <?php
        $flash = Flash::show();
        if (!empty($flash)): ?>
            <div class="alert alert-<?=$flash['type']?>">
                <p><?=$flash['msg']?></p>
            </div><!--alert-->
        <?php endif; ?>