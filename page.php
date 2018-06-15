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

    // Animation for hovering over sidebar icons
    $(".sidebar-icon").hover(function() {
      // Hover on top
      $(this).css("background-color", "#117cb1");
      $(this).css("transition", "0.5s");
      $(this).children(".sidebar-img").css("visibility", "hidden");
      $(this).children("#label").css("visibility", "visible");
    }, function() {
      // Hover away from
      $(this).css("background-color", "transparent");
      $(this).css("transition", "0.5s");
      $(this).children(".sidebar-img").css("visibility", "visible");
      $(this).children("#label").css("visibility", "hidden");
    });

    $(".submenu-block").hover(function() {
      // Hover on top
      $(this).css("background", "#e4e0e0");
      $(this).css("transition", "0.5s");
    }, function() {
      // Hover away from
      $(this).css("background", "#f0eeee");
      $(this).css("transition", "0.5s");
    });
  });
  </script>

  <!-- Creates the sidebar -->
  <div class="sidebar">
    <div id="sidebar-toggle" class="sidebar-button">&#9776;</div>
    <div class="arrow-down"></div>
    <div class="sidebar-icon-wrapper">
      <div class="sidebar-icon">
        <div class="sidebar-img"><img id="user" src="<?php bloginfo('template_directory'); ?>/img/user.png"/></div>
        <div id="label" class="sidebar-label">User</div>
      </div>
      <div class="sidebar-icon">
        <div class="sidebar-img"><img id="clock" src="<?php bloginfo('template_directory'); ?>/img/clock.png"/></div>
        <div id="label" class="sidebar-label">
          <?php
          echo human_time_diff(get_the_modified_time('U'), time());
          ?> ago
        </div>
      </div>
      <a href="mailto:syshelp@hsl.washington.edu">
        <div class="sidebar-icon">
          <div class="sidebar-img"><img src="<?php bloginfo('template_directory'); ?>/img/ticket.png"/></div>
          <div id="label" class="sidebar-label">
            Send a Ticket
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- PHP for the dropdown menu when the screen width is too narrow -->
  <div id="menu-container">
    <div id="m-wrap">
      <div class="m-title"><span>Menu</span></div>
      <div class="drawer">
        <div class="vertical-header">
          <!-- Manually add the home page tab -->
          <?php if (is_front_page()) { ?>
            <a class="active" href="<?php echo home_url(); ?>">Home</a>
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
              <a class="active" href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a>
            <?php } else { // Check to see if parent or grandparent of page is one of the main header tabs
              $parents = get_post_ancestors(get_the_ID());
              foreach ($parents as $parent) {
                if (strcmp($page->post_title, get_the_title($parent)) == 0) {
                  $selected = True;
                  ?> <a class="active" href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a> <?php
                }
              }
              if (!$selected) {
                ?> <a href="<?php echo get_page_link($page->ID)?>"> <?php echo $page->post_title; ?> </a> <?php
              }
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- PHP for the menu bar when the screen width is wide enough -->
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

  <!-- <div class="page-title">
  <?php echo get_the_title(); ?>
  </div> -->

  <!-- Show page content -->
  <div class="page">
  <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  &nbsp;

  <!-- Show footer -->
  <?php get_footer(); ?>

</div>
