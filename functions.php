<?php
// Add scripts and stylesheets
function hslSystems_scripts() {
	wp_enqueue_style('blog', get_template_directory_uri() . '/css/main.css');
}

// function my_favicon() { ?&amp;amp;amp;gt;
// &amp;amp;amp;lt;link rel=&amp;amp;amp;quot;shortcut icon&amp;amp;amp;quot; href=&amp;amp;amp;quot;yourimagepathgoeshere&amp;amp;amp;quot; &amp;amp;amp;gt;
// &amp;amp;amp;lt;?php }
//
// add_action('wp_head', 'my_favicon');

add_action('wp_enqueue_scripts', 'hslSystems_scripts');
