<div class="body">
  <?php get_header(); ?>

  <!-- <?php if ( is_front_page() ) { ?>
    <div class="sub-header-text">Systems Support</div>
  <?php } else { ?>
    <div class="sub-header-text"><?php echo get_the_title(); ?></div>
  <?php } ?> -->

  You are here: <?php echo get_the_title(); ?>

  <div class="layout">
  <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  &nbsp;

  <?php get_footer(); ?>

</div>
