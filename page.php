<div class="body">
  <?php get_header(); ?>

  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <script>
  $(document).ready(function() {
  var last;

  // Closes drawers. Removes header
  // selections.
  function clear() {
    $(".m-title").removeClass("active");
    $(".drawer").removeClass("open");
    last = null;
  }

  /* • Opens/Closes drawer by its header.
     • Enables consistent opening/closing of
       the same drawer.*/
  function load(element) {
    var temp = element.index();

    if (temp == last)
      clear();
    else {
      clear();
      element.addClass("active");
      element.next().addClass("open");
      last = element.index();
    }
  }

  // Listens for header clicks.
  $(".m-title").click(function() {
    load($(this));
  });

});
  </script>

  <div id="menu-container">
    <div id="m-wrap">
      <div id="m-map" class="m-title"> <span>Menu</span></div>
      <div id="m-draw1" class="drawer">
        <!-- Manually add the home page tab -->
        <?php if (is_front_page()) { ?>
          <a href="<?php echo home_url(); ?>">Home</a>
        <?php } else { ?>
          <a href="<?php echo home_url(); ?>">Home</a>
        <?php } ?>

        <!-- Collect names of parent pages  -->
        <?php
        $args = array (
          // Only pages whose parent is the home page should be displayed in the header tabs
          'parent' => get_option('page_on_front')
        );
        $pages = get_pages($args); // Array of pages whose parent is the home page
        // Check what page you are on, so that the corresponding tab is "selected"
        foreach ($pages as $page) {
          $selected = False;
          if (strcmp($page->post_title, get_the_title()) == 0) { ?>
            <?php $selected = True; ?>
            SELECTED - [
          <?php } else { // Check to see if parent or grandparent of page is one of the main header tabs
            $parents = get_post_ancestors(get_the_ID());
            foreach ($parents as $parent) {
              if (strcmp($page->post_title, get_the_title($parent)) == 0) {
                $selected = True;
                ?> SELECTED - [<?php
              }
            }
            if (!$selected) {
              ?> ] <?php
            }
          } ?>
            <a href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a>]<?php
        }
        ?>
      </div>
    </div>
  </div>

  <div id="header">
    <div class="header-background"></div>
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
        // Only pages whose parent is the home page should be displayed in the header tabs
        'parent' => get_option('page_on_front')
      );
      $pages = get_pages($args); // Array of pages whose parent is the home page
      // Check what page you are on, so that the corresponding tab is "selected"
      foreach ($pages as $page) {
        $selected = False;
        if (strcmp($page->post_title, get_the_title()) == 0) { ?>
          <?php $selected = True; ?>
          <li id="selected">
        <?php } else { // Check to see if parent or grandparent of page is one of the main header tabs
          $parents = get_post_ancestors(get_the_ID());
          foreach ($parents as $parent) {
            if (strcmp($page->post_title, get_the_title($parent)) == 0) {
              $selected = True;
              ?> <li id="selected"> <?php
            }
          }
          if (!$selected) {
            ?> <li> <?php
          }
        } ?>
          <a href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a></li> <?php
      }
      ?>
    </ul>
  </div>

  <div class="you-are-here">
  <!-- Get post ancestors to show in navigation bar -->
  <?php
  $parents = array_reverse(get_post_ancestors($post));
  foreach ($parents as $parent) {
    ?> <a href="<?php echo get_page_link($parent) ?>"><?php echo get_the_title($parent) ?></a> <i class="arrow right"></i> <?php
  }
  echo get_the_title();
  ?>
  </div>

  <div class="page-title">
  <?php echo get_the_title(); ?>
  </div>

  <!-- Show page content -->
  <div class="page">
  <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  &nbsp;

  <!-- Show footer -->
  <?php get_footer(); ?>

</div>
