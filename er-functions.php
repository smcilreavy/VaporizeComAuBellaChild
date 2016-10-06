<?php
/**
 * Bella Child functions file.
 */




add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 21;' ), 20 );

function bella_parent_styles() {

	// Enqueue the parent stylesheet
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css','settings' );
	wp_enqueue_style( 'main-child', get_stylesheet_uri() ,'main' );


}
add_action( 'wp_enqueue_scripts', 'bella_parent_styles',11 );





  
if (function_exists('register_sidebar')) { 
	
	register_sidebar( array(
		'name' =>  'Contact' ,
		'id' => 'er_contact_sidebar',
		'description' => 'Add Widget for right side in Contact Page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		));
	
	}

	
	




?>


