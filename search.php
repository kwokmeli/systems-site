<div class="body">
<?php get_header(); ?>
    <div class="sub-header-text">Search Results</div>

<?php if ( have_posts() ) : ?>
    <div class="search-results-title-text">Search results for query "<?php the_search_query(); ?>":</div>
	<?php
	while ( have_posts() ) : the_post(); ?>


			<?php if ( has_post_thumbnail() ) { ?>

			<?php } ?>
            <a href="<?php the_permalink(); ?>"><?php the_title('<div class="search-results-header">', '</div>') ?></a>

				<div class="search-results-text"><?php echo get_the_excerpt(); ?></div>

	<?php endwhile;

else : ?>

  <div class="no-results-text">No search results were found for query "<?php the_search_query(); ?>".</div>

<?php endif;

get_footer();

?>
</div>
