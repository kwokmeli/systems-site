<?php get_header(); ?>

  <div class="blog-post-title">
    <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  
<?php get_footer(); ?>
