<div class="body">
  <?php get_header(); ?>

  <!-- <?php if ( is_front_page() ) { ?>
    <div class="sub-header-text">Systems Support</div>
  <?php } else { ?>
    <div class="sub-header-text"><?php echo get_the_title(); ?></div>
  <?php } ?> -->

<div id="header">
  <ul>
    <li><a href="">Th</a></li>
    <li id="selected"><a href="">That</a></li>
    <!-- <li><a href="">The Other fwefewfwef</a></li> -->
    <li><a href="">Banana fsdf</a></li>
  </ul>
</div>

<div id="content">
  Content there
</div>

  <br>
  You are here: <?php echo get_the_title(); ?>

  <div class="layout">
  <?php echo get_post_field('post_content', $post->ID); ?>
  </div>
  &nbsp;

  <?php get_footer(); ?>

</div>
