<div class="body">
  <?php get_header(); ?>

  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>

  <script>
  $(document).ready(function() {
    var last;
    var $window = $(window);

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
      checkWidth();
    });

    // Allow user to logout
    $("#login").hover(function() {
      $(this).css("cursor", "pointer");
    }, function() {
      $(this).css("cursor", "default");
    });

    $("#login").click(function(event) {
      checkWidth();
      event.stopPropagation();
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
        checkWidth();
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

    // Hide logout option when user clicks away
    $(document).click(function() {
      if ($(".logout").css("visibility") == "visible") {
        $(".logout").css("visibility", "hidden");
      }
    });

    // Resize elements on window resize
    function checkWidth() {
      var windowSize = $window.width();

      if ($(".sidebar").css("width") == "150px") {
        // Rules when the sidebar is expanded (150px)
        //  Remove open dropdown menu if window expands
        if (windowSize >= 664) {
          $(".vertical-header").css("display", "none");
        } else {
          $(".vertical-header").css("display", "");
        }

        // Re-position search bar
        if (windowSize <= 834) {
          // Increase the white space below the main logo to make room for the search bar
          $(".blog-header").css("height", "200px");

          $(".search-box").css("margin-top", "30px");
          $(".search-box").css("float", "none");
          $(".search-box").css("display", "inline-block");
          $(".search-box").css("margin-left", "5px");
          $(".search-wrapper").css("text-align", "center");
          $(".search-wrapper").css("width", "100%");
          $(".header-logo").css("display", "inline-block");
          // Left offset is 60px to make up for the width of the sidebar, which is also 60px
          $(".header-logo").css("margin-left", "15px");
          $(".header-wrapper").css("text-align", "center");
          $(".header-wrapper").css("width", "100%");
          // Re-position search button
          $("input[type=submit]").css("right", "-9px");
          // Re-position logout button
          $(".logout").css("margin-top", "-140px");

        } else {
          $(".blog-header").css("height", "114px");

          $(".search-box").css("margin-top", "-60px");
          $(".search-box").css("float", "right");
          $(".search-box").css("display", "");
          $(".search-box").css("margin-left", "");
          $(".search-wrapper").css("text-align", "");
          $(".search-wrapper").css("width", "");
          $(".header-logo").css("display", "");

          $(".header-logo").css("margin-left", "10px");
          $(".header-wrapper").css("text-align", "");
          $(".header-wrapper").css("width", "");

          $("input[type=submit]").css("right", "-5px");
          $(".logout").css("margin-top", "-54px");
        }

        if (windowSize <= 663) {
          // Shrink header tabs to a dropdown menu
          $("#header").css("display", "none");
          $(".you-are-here").css("margin-top", "0px");
          $("#menu-container").css("visibility", "visible");
          $(".page-title").css("margin-top", "24px");
        } else {
          // Expand dropdown menu into header tabs
          $("#header").css("display", "");
          $(".you-are-here").css("margin-top", "46px");
          $("#menu-container").css("visibility", "hidden");
          $(".page-title").css("margin-top", "20px");
          clear();
        }

        if (windowSize <= 639) {
          $(".page").css("margin-left", "20px");
          $(".page").css("margin-right", "20px");
        } else {
          $(".page").css("margin-left", "55px");
          $(".page").css("margin-right", "55px");
        }

        if (windowSize <= 604) {
          $(".header-logo img").css("height", "70px"); // TODO: Add !important
          $(".blog-header").css("height", "170px");

          $(".logout").css("margin-top", "-110px");

        } else if (windowSize <= 834) {
          $(".blog-header").css("height", "200px");
          $(".logout").css("margin-top", "-140px");
        } else {
          $(".header-logo img").css("height", "92px");
          $(".blog-header").css("height", "114px");

          $(".logout").css("margin-top", "-54px");
        }

        if (windowSize <= 592) {
          $(".footer-link").css("margin-left", "12px");
          $(".footer-link").css("margin-right", "12px");
        } else {
          $(".footer-link").css("margin-left", "28px");
          $(".footer-link").css("margin-right", "28px");
        }

        if (windowSize <= 561) {
          $(".footer-divider").css("margin-top", "10px");
          $(".footer-divider").css("margin-bottom", "8px");
        } else {
          $(".footer-divider").css("margin-top", "20px");
          $(".footer-divider").css("margin-bottom", "18px");
        }

        if (windowSize <= 557) {
          $(".header-logo img").css("height", "60px"); // TODO: Add !important
          $(".header-logo img").css("margin-left", "15px");

          $(".submenu-block").css("transition", "0.5s");
          $(".submenu-block").css("height", "250px");
          $(".submenu-block").css("width", "250px");
          $(".submenu-block").css("font-size", "9.5pt"); // TODO: Add !important

          $(".submenu-block h1").css("font-size", "13pt"); // TODO: Add !important

          $(".submenu-block img").css("margin-top", "-30px");

          $(".search-box").css("margin-left", "20px");
        } else if (windowSize <= 604) {
          $(".header-logo img").css("height", "70px");
          $(".header-logo img").css("margin-left", "");

          $(".submenu-block").css("transition", "0.5s");
          $(".submenu-block").css("height", "300px");
          $(".submenu-block").css("width", "300px");
          $(".submenu-block").css("font-size", "11pt");

          $(".submenu-block h1").css("font-size", "16pt");

          $(".submenu-block img").css("margin-top", "");

          $(".search-box").css("margin-left", "5px");

        } else {
          $(".header-logo img").css("height", "92px");
          $(".header-logo img").css("margin-left", "");

          $(".submenu-block").css("transition", "0.5s");
          $(".submenu-block").css("height", "300px");
          $(".submenu-block").css("width", "300px");
          $(".submenu-block").css("font-size", "11pt");

          $(".submenu-block h1").css("font-size", "16pt");

          $(".submenu-block img").css("margin-top", "");

          $(".search-box").css("margin-left", "5px");
        }

        if (windowSize <= 488) {
          $("#s").css("width", "90px");
          $(".header-logo img").css("height", "55px");
        } else if (windowSize <= 557) {
          $("#s").css("width", "");
          $(".header-logo img").css("height", "60px");
        } else if (windowSize <= 604) {
          $("#s").css("width", "");
          $(".header-logo img").css("height", "70px")
        } else {
          $("#s").css("width", "");
          $(".header-logo img").css("height", "92px");
        }

      } else {
        // Rules when the sidebar is collapsed (60px)
        //  Remove open dropdown menu if window expands
        if (windowSize >= 591) {
          $(".vertical-header").css("display", "none");
        } else {
          $(".vertical-header").css("display", "");
        }

        if (windowSize <= 710) {
          // Increase the white space below the main logo to make room for the search bar
          $(".blog-header").css("height", "200px");

          // Re-position search bar
          $(".search-box").css("margin-top", "30px");
          $(".search-box").css("float", "none");
          $(".search-box").css("display", "inline-block");
          $(".search-box").css("margin-left", "5px");
          $(".search-wrapper").css("text-align", "center");
          $(".search-wrapper").css("width", "100%");
          $(".header-logo").css("display", "inline-block");
          // Left offset is 60px to make up for the width of the sidebar, which is also 60px
          $(".header-logo").css("margin-left", "15px");
          $(".header-wrapper").css("text-align", "center");
          $(".header-wrapper").css("width", "100%");
          // Re-position search button
          $("input[type=submit]").css("right", "-9px");
        } else {
          $(".blog-header").css("height", "114px");

          $(".search-box").css("margin-top", "-60px");
          $(".search-box").css("float", "right");
          $(".search-box").css("display", "");
          $(".search-box").css("margin-left", "");
          $(".search-wrapper").css("text-align", "");
          $(".search-wrapper").css("width", "");
          $(".header-logo").css("display", "");
          $(".header-logo").css("margin-left", "10px");
          $(".header-wrapper").css("text-align", "");
          $(".header-wrapper").css("width", "");
          $("input[type=submit]").css("right", "-5px");
        }

        if (windowSize <= 634) {
          $(".page").css("margin-left", "20px");
          $(".page").css("margin-right", "20px");
        } else {
          $(".page").css("margin-left", "55px");
          $(".page").css("margin-right", "55px");
        }

        // Shrink header tabs to a dropdown menu
        if (windowSize <= 590) {
          $("#header").css("display", "none");
          $(".you-are-here").css("margin-top", "0px");
          $("#menu-container").css("visibility", "visible");
          $(".page-title").css("margin-top", "24px");
        } else {
          // Expand dropdown menu into header tabs
          $("#header").css("display", "");
          $(".you-are-here").css("margin-top", "46px");
          $("#menu-container").css("visibility", "hidden");
          $(".page-title").css("margin-top", "20px");
          clear();
        }

        if (windowSize <= 563) {
          $(".header-logo img").css("height", "70px"); // TODO: Add !important
          $(".blog-header").css("height", "170px");

        } else if (windowSize <= 710) {
          $(".blog-header").css("height", "200px");
        } else {
          $(".header-logo img").css("height", "92px");
          $(".blog-header").css("height", "114px");
        }

        // Adjust margins so footer doesn't vertically overflow
        if (windowSize <= 502) {
          $(".footer-link").css("margin-left", "12px");
          $(".footer-link").css("margin-right", "12px");
        } else {
          $(".footer-link").css("margin-left", "28px");
          $(".footer-link").css("margin-right", "28px");
        }

        if (windowSize <= 466) {
          $(".footer-divider").css("margin-top", "10px");
          $(".footer-divider").css("margin-bottom", "8px");
        } else {
          $(".footer-divider").css("margin-top", "20px");
          $(".footer-divider").css("margin-bottom", "18px");
        }

        if (windowSize <= 452) {
          $(".header-logo img").css("height", "60px"); // TODO: Add !important
          $(".header-logo img").css("margin-left", "15px");

          $(".submenu-block").css("transition", "0.5s");
          $(".submenu-block").css("height", "250px");
          $(".submenu-block").css("width", "250px");
          $(".submenu-block").css("font-size", "9.5pt"); // TODO: Add !important

          $(".submenu-block h1").css("font-size", "13pt"); // TODO: Add !important

          $(".submenu-block img").css("margin-top", "-30px");

          $(".search-box").css("margin-left", "20px");
        } else if (windowSize <= 563) {
          $(".header-logo img").css("height", "70px");
          $(".header-logo img").css("margin-left", "");

          $(".submenu-block").css("transition", "0.5s");
          $(".submenu-block").css("height", "300px");
          $(".submenu-block").css("width", "300px");
          $(".submenu-block").css("font-size", "11pt");

          $(".submenu-block h1").css("font-size", "16pt");

          $(".submenu-block img").css("margin-top", "");

          $(".search-box").css("margin-left", "5px");

        } else {
          $(".header-logo img").css("height", "92px");
          $(".header-logo img").css("margin-left", "");

          $(".submenu-block").css("transition", "0.5s");
          $(".submenu-block").css("height", "300px");
          $(".submenu-block").css("width", "300px");
          $(".submenu-block").css("font-size", "11pt");

          $(".submenu-block h1").css("font-size", "16pt");

          $(".submenu-block img").css("margin-top", "");

          $(".search-box").css("margin-left", "5px");
        }
      }
    }

    // Execute on load
    checkWidth();

    // Bind event listener
    $(window).resize(checkWidth);

    // Listen for clicks on menu button
    $(document).on("click", ".m-title", function(event) {
      event.stopPropagation();
      load($(this));
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
          ?>Not logged in<?php
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
