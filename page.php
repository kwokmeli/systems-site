<div class="body">
  <?php get_header(); ?>

  <div id="header">
    <ul>
      <!-- Manually add the home page tab -->
      <?php if (is_front_page()) { ?>
        <li id="selected"><a href="<?php echo home_url(); ?>">Home</a></li>
      <?php } else { ?>
        <li><a href="<?php echo home_url(); ?>">Home</a></li>
      <?php } ?>

      <!-- Collect names of parent pages  -->
      <?php
      $args = array (
        // Only pages whose parent is the home page should be displayed in the header
        'parent' => get_option('page_on_front')
      );
      $pages = get_pages($args);
      foreach ($pages as $page) {
        if (strcmp($page->post_title, get_the_title()) == 0) { ?>
          <li id="selected">
        <?php } else { ?>
          <li>
        <?php } ?>
          <a href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a></li> <?php
      }
      ?>
    </ul>
  </div>

  <!-- Creates blue bar below header tabs. Text can be placed here. -->
  <div id="content">
  </div>

  <div class="you-are-here">
  You are here:

  <!-- Get post ancestors to show in navigation bar -->
  <?php
  $parents = array_reverse(get_post_ancestors($post));
  foreach ($parents as $parent) {
    ?> <a href="<?php echo get_page_link($parent) ?>"><?php echo get_the_title($parent) ?></a> → <?php
  }
  echo get_the_title();
  ?>
  </div>

  <div class="page-title">
  <?php echo get_the_title(); ?>
  </div>

  <!-- Show page content -->
  <div class="page">
  <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  &nbsp;

  <!-- Show footer -->
  <?php get_footer(); ?>

</div>
