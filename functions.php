<?php
// Add scripts and stylesheets
function hslSystems_scripts() {
	wp_enqueue_style('blog', get_template_directory_uri() . '/css/main.css');
}

function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600', false );
}

// https://gist.github.com/bonny/5772054
// Prevent password-protected pages from showing up on the sitemap
function ep_exclude_password_protected_pages($pages, $r) {
	if (isset($r["exclude_password_protected"]) && $r["exclude_password_protected"]) {
		for ($i = 0; $i < sizeof($pages); $i++) {
			if (post_password_required($pages[$i])) {
				unset($pages[$i]);
			}
		}
	}
	return $pages;
}

add_filter("get_pages", "ep_exclude_password_protected_pages", 10, 2);

add_action('wp_enqueue_scripts', 'wpb_add_google_fonts');

add_action('wp_enqueue_scripts', 'hslSystems_scripts');

// REMOVE THIS FUNCTION IF NOT DEBUGGING
// if (!function_exists('write_log')) {
// 	function write_log($log) {
// 		if (is_array($log) || is_object($log)) {
// 			error_log(print_r($log, true));
// 		} else {
// 			error_log($log);
// 		}
// 	}
// }

?>
