<?php get_header(); ?>

    <!-- <?php echo get_post_field('post_content', $post->ID); ?> -->
    <?php if (have_posts()) : while (have_posts()) : the_post();
    the_content();
    endwhile; endif; ?>

<?php get_footer(); ?>
