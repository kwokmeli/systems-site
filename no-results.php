<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shape
 * @since Shape 1.0
 */
?>

<article id="post-0" class="post no-results not-found">

        <h1>Nothing Found</h1>
        <div class="line"></div>
    <!-- .entry-header -->
    <div class="no-results">

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <h4>Publish a post to get started.</h4>

        <?php elseif ( is_search() ) : ?>

            <h4>Sorry, but nothing matched your search terms. Please search again. </h4>

        <?php else : ?>

            <h4>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</h4>

        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->
