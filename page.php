<div class="body">
  <?php get_header(); ?>

  <?php if ( is_front_page() ) { ?>
    <h1>Systems Support</h1>
  <?php } else { ?>
    <h1><?php echo get_the_title(); ?></h1>
  <?php } ?>

  <div class="layout">
  <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  &nbsp;

  <?php get_footer(); ?>

</div>
