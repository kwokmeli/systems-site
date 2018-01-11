<?php get_header(); ?>
    <h1>Search Results</h1>

<?php if ( have_posts() ) : ?>
    <h2>Search results for query: "<?php the_search_query(); ?>"</h2>
	<?php
	while ( have_posts() ) : the_post(); ?>


			<?php if ( has_post_thumbnail() ) { ?>

			<?php } ?>
            <a href="<?php the_permalink() ?>"><?php the_title('<h3>', '</h3>') ?></a>

				<h5><?php echo get_the_excerpt() ?></h5>

	<?php endwhile;

else :
	echo '<h6>No search results were found.</h6>';

endif;

get_footer();

?>
