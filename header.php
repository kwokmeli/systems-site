<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

 <title> <?php echo get_bloginfo('name'); ?> </title>
      <div class="blog-title"><a href="<?php bloginfo('wpurl');?>"><?php echo get_bloginfo('name');?></a></div>

      <div class="search-box"><?php get_search_form(); ?></div>
    <?php wp_head(); ?>
  </head>

  <body>
