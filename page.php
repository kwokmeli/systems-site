<?php if ( is_front_page() ) { ?> <!-- CSS for home page -->
      <div class="body">
        <?php get_header(); ?>
        <h1>Systems Support</h1>
        <div class="layout">
        <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        &nbsp;
        <?php get_footer(); ?>
        </div>
<?php } else { ?> <!-- CSS for other pages -->
    <div class="body">
        <?php get_header(); ?>
        <h1><?php echo get_the_title(); ?></h1>
        <div class="layout">
        <?php echo get_post_field('post_content', $post->ID); ?>
        </div>
        &nbsp;
        <?php get_footer(); ?>
      </div>
<?php } ?>
