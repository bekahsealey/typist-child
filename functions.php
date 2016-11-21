<?php


add_action( 'wp_enqueue_scripts', 'typist_child_enqueue_styles' );
function typist_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

if ( ! function_exists( 'typist_child_setup' ) ) :
	function typist_child_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'status',  'quote', 'gallery' ) ); 	//post formats support
		add_post_type_support( 'page', 'post-formats' );
    	register_taxonomy_for_object_type( 'post_format', 'page' );
	}
endif;

add_action( 'init', 'typist_child_setup' ); //setup ends

