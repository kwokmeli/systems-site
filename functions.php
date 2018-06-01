<?php
// Add scripts and stylesheets
function hslSystems_scripts() {
	wp_enqueue_style('blog', get_template_directory_uri() . '/css/main.css');
}

function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600', false );
}

add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

// function my_favicon() { ?&amp;amp;amp;gt;
// &amp;amp;amp;lt;link rel=&amp;amp;amp;quot;shortcut icon&amp;amp;amp;quot; href=&amp;amp;amp;quot;yourimagepathgoeshere&amp;amp;amp;quot; &amp;amp;amp;gt;
// &amp;amp;amp;lt;?php }
//
// add_action('wp_head', 'my_favicon');

add_action('wp_enqueue_scripts', 'hslSystems_scripts');

// REMOVE THIS FUNCTION IF NOT DEBUGGING
if (!function_exists('write_log')) {
	function write_log($log) {
		if (is_array($log) || is_object($log)) {
			error_log(print_r($log, true));
		} else {
			error_log($log);
		}
	}
}
