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
        'parent' => 6
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

  <div id="content">
  </div>

  <div class="you-are-here">
  You are here: <a href="<?php echo get_page_link()?>"><?php echo get_the_title(); ?></a>
  </div>

  <div class="layout">
  <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  &nbsp;

  <?php get_footer(); ?>

</div>
