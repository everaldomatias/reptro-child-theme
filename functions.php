<?php
/*This file is part of Reptro Child Theme, reptro child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing).
*/

if ( ! function_exists( 'rc_enqueue_child_styles' ) ) {
	function rc_enqueue_child_styles() {

	    // loading parent style
	    wp_register_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'parent-style' );

	    // loading child style
	    wp_register_style( 'reptro-child-style', get_stylesheet_directory_uri() . '/style.css' );
	    wp_enqueue_style( 'reptro-child-style' );

		// loading child scripts
		wp_enqueue_script( 'reptro-child-script', get_stylesheet_directory_uri() . '/assets/js/scripts.js', '', null, true );

	}
    add_action( 'wp_enqueue_scripts', 'rc_enqueue_child_styles' );
}

/* Write here your own functions */ 

/**
 * Add settings page
 */
require_once( dirname( __FILE__ ) . '/inc/settings.php' );

/**
 * Add checkout in the single lp_course
 */
add_action(
	'learn-press/course-content-summary',
	function () {
		get_template_part( '/template-parts/pagseguro' );
	},
	74
);
