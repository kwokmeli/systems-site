<div class="body">
<?php get_header(); ?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<script>
$(document).ready(function() {
  var last;

  // Closes drawers
  function clear() {
    $(".m-title").removeClass("active");
    $(".drawer").removeClass("open");
    last = null;
  }

  function load(element) {
    var temp = element.index();

    // Closes menu
    if (temp == last)
      clear();

    // Opens menu
    else {
      // clear();
      element.addClass("active");
      element.next().addClass("open");
      last = element.index();
    }
  }

  // Listens for header clicks
  $(".m-title").click(function() {
    load($(this));
  });
});
</script>

<!-- PHP for the dropdown menu when the screen width is too narrow -->
<div id="menu-container">
  <div id="m-wrap">
    <div class="m-title"><span>Menu</span></div>
    <div class="drawer">
      <div class="vertical-header">
        <!-- Manually add the home page tab -->
        <a class ="active" href="<?php echo home_url(); ?>">Home</a>

        <!-- Collect names of parent pages  -->
        <?php
        $args = array (
          // Only pages whose parent is the home page should be displayed in the header tabs
          'parent' => get_option('page_on_front')
        );
        $pages = get_pages($args); // Array of pages whose parent is the home page
        // Check what page you are on, so that the corresponding tab is "selected"
        foreach ($pages as $page) {
              ?> <a href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a> <?php
        } ?>
      </div>
    </div>
  </div>
</div>

<!-- PHP for the menu bar when the screen width is wide enough -->
<div id="header">
  <div class="header-background"></div>
  <ul>
    <!-- Manually add the home page tab -->
    <li id="selected"><a href="<?php echo home_url(); ?>">Home</a></li>

    <!-- Collect names of parent pages  -->
    <?php
    $args = array (
      // Only pages whose parent is the home page should be displayed in the header tabs
      'parent' => get_option('page_on_front')
    );
    $pages = get_pages($args); // Array of pages whose parent is the home page
    // Check what page you are on, so that the corresponding tab is "selected"
    foreach ($pages as $page) {
      ?> <li><a href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a></li> <?php
    } ?>
  </ul>
</div>

<div class="you-are-here">
Home
</div>

<!-- Show search results, if any -->
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
