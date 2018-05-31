<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

<div class="blog-header">
      <title> <?php echo get_bloginfo('name'); ?> </title>
      <div class="header-logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" height="82px" width="auto"></a></div>
      <div class="search-wrapper">
        <div class="search-box"><?php get_search_form(); ?></div>
      </div>
    <?php wp_head(); ?>
</div>
  </head>

  <body>
