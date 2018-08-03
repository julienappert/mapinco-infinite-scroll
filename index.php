<?php
/*
Plugin Name: Mapinco Infinite Scroll
Version: 1.0.1
Author: Julien Appert
Author URI: https://mapinco.fr
*/


defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

add_action( 'wp_enqueue_scripts', 'mapinscroll_enqueue_styles' );
function mapinscroll_enqueue_styles() {
	// on charge uniquement si nécessaire
	if(is_archive() || is_single() || is_page(get_option('page_on_front'))){
	
		  wp_enqueue_script('ias', plugins_url( 'jquery-ias.min.js', __FILE__ ), array('jquery'));
		  wp_enqueue_script('mapinscroll', plugins_url( 'mapinco-infinite-scroll.js', __FILE__ ), array('jquery','ias'));
		  
			$mapinscroll = array(
				'spinner'	=>	'<div class="ias-spinner" style="text-align: center;"><img src="{src}"/></div>',
				'container'	=> "#content",
				'item'	=> ".post",
				'pagination'	=> ".navigation",
				'next'	=>	'.navigation .nav-previous a',	
				'negativeMargin'	=>	10,	
				'more' => '<div class="mapinscroll_more"><a >Plus de sujets</a></div>',
				'noneLeft'	=>	'<div class="mapinscroll_noneLeft"><span>Vous êtes arrivé à la fin.</span></div>'
			);		  
		  
		  if(is_archive() || is_page(get_option('page_on_front'))){
		  
		  	$mapinscroll['offset']	=	2;
				wp_localize_script( 'mapinscroll', 'mapinscroll',
					apply_filters('mapinscroll_options',$mapinscroll, 'archive')
				); 
						  
		  } 
		  elseif(is_single()){
		  
		  	$mapinscroll['offset']	= get_option('posts_per_page');
				wp_localize_script( 'mapinscroll', 'mapinscroll',
				    apply_filters('mapinscroll_options',$mapinscroll, 'single')
				); 		  
				
		  } 		  
}  
}
