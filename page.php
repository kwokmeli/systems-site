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

    // Sidebar: 60px
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

    // Animates background color transition of submenu blocks
    $(".submenu-block").hover(function() {
      // Hover on top
      $(this).css("background", "#e4e0e0");
      $(this).css("transition", "0.75s");
    }, function() {
      // Hover away from
      $(this).css("background", "#f0eeee");
      $(this).css("transition", "0.75s");
    });

    // Controls expansion/collapse of sidebar when clicked
    $(".sidebar-button").click(function() {
      if ($(".sidebar").css("width") == "150px") {
        // Collapse sidebar
        $(".logout").css("visibility", "hidden");
        $(".arrow-right").css("visibility", "hidden");
        $(".sidebar").css("width", "60px");
        $("body").css("margin", "0px 0px 0px 60px");
        $(".sidebar-icon").removeClass("open");
        $(".sidebar-img").removeClass("open");
        $(".sidebar").removeClass("open");
        $(".sidebar-label").removeClass("open");

        $(".sidebar-icon").children("#label").css("visibility", "hidden");

        $(".sidebar-icon").hover(function() {
          // Hover on top
          $(this).css("background-color", "#117cb1");
          $(this).children("#label").css("visibility", "visible");
          $(this).children(".sidebar-img").css("visibility", "hidden");
        }, function() {
          // Hover away from
          $(this).css("background-color", "transparent");
          $(this).children("#label").css("visibility", "hidden");
          $(this).children(".sidebar-img").css("visibility", "visible");
        });

      } else {
        // Expand sidebar
        $(".arrow-right").css("visibility", "visible");
        $(".sidebar").css("width", "150px");
        $("body").css("margin", "0px 0px 0px 150px");
        $(".sidebar-icon").addClass("open");
        $(".sidebar-img").addClass("open");
        $(".sidebar").addClass("open");
        $(".sidebar-label").addClass("open");

        $(".sidebar-icon.open").children("#label").css("visibility", "visible");
        $(".sidebar-icon.open").children(".sidebar-img").css("visibility", "visible");

        $(".sidebar-icon.open").hover(function() {
          // Hover on top
          $(this).css("background-color", "#117cb1");
          $(this).children("#label").css("visibility", "visible");
          $(this).children(".sidebar-img.open").css("visibility", "visible");

        }, function() {
          // Hover away from
          $(this).css("background-color", "transparent");
          $(this).children("#label").css("visibility", "visible");
          $(this).children(".sidebar-img.open").css("visibility", "visible");
        });
      }
    });

    // Allow user to logout
    $("#login").hover(function() {
      $(this).css("cursor", "pointer");
    }, function() {
      $(this).css("cursor", "default");
    });

    $("#login").click(function() {
      if ($(".sidebar").css("width") == "150px") {
        if ($(".logout").css("visibility") == "hidden") {
          $(".logout").css("visibility", "visible");
        } else {
          $(".logout").css("visibility", "hidden");
        }
      } else {
        // Expand sidebar if collapsed login icon is clicked
        // Expand sidebar
        $(".arrow-right").css("visibility", "visible");
        $(".sidebar").css("width", "150px");
        $("body").css("margin", "0px 0px 0px 150px");
        $(".sidebar-icon").addClass("open");
        $(".sidebar-img").addClass("open");
        $(".sidebar").addClass("open");
        $(".sidebar-label").addClass("open");

        $(".sidebar-icon.open").children("#label").css("visibility", "visible");
        $(".sidebar-icon.open").children(".sidebar-img").css("visibility", "visible");

        $(".sidebar-icon.open").hover(function() {
          // Hover on top
          $(this).css("background-color", "#117cb1");
          $(this).children("#label").css("visibility", "visible");
          $(this).children(".sidebar-img.open").css("visibility", "visible");

        }, function() {
          // Hover away from
          $(this).css("background-color", "transparent");
          $(this).children("#label").css("visibility", "visible");
          $(this).children(".sidebar-img.open").css("visibility", "visible");
        });
        $(".logout").css("visibility", "visible");

      }
    });

  });
  </script>

  <!-- Creates the sidebar -->
  <div class="logout">Logout <img src="<?php bloginfo('template_directory'); ?>/img/logout.png" /></div>
  <div class="sidebar">
    <div id="sidebar-toggle" class="sidebar-button">&#9776;</div>
    <div class="arrow-down"></div>
    <div class="sidebar-icon-wrapper">
      <div id="login" class="sidebar-icon">
        <div class="sidebar-img"><img id="user" src="<?php bloginfo('template_directory'); ?>/img/user.png"/></div>
        <div id="label" class="sidebar-label">
        <?php $netid = $_SERVER['REMOTE_USER'];
        if ($netid === NULL) {
          ?> USER<?php
          ?> <?php
        } else {
          echo $netid;
        } ?>
        </div>
        <div class="arrow-right"></div>
      </div>
      <div class="sidebar-icon">
        <div class="sidebar-img"><img id="clock" src="<?php bloginfo('template_directory'); ?>/img/calendar.png"/></div>
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
            'parent' => get_option('page_on_front'),
            'sort_column' => 'menu_order'
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
        'parent' => get_option('page_on_front'),
        'sort_column' => 'menu_order'
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
  <!-- <?php echo get_post_field('post_content', $post->ID); ?> -->

  <?php if (have_posts()) : while (have_posts()) : the_post();
  the_content();
  endwhile; endif; ?>

  </div>

  <!-- Show footer -->
  <?php get_footer(); ?>

</div>
