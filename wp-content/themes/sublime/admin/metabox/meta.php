<?php
/*--------------------------*
/* Meta Boxes
/*--------------------------*/

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

function cmb_sample_metaboxes( array $meta_boxes ) {

	
	$prefix = 'tk_';

	$meta_boxes[] = array(
		'id' => 'header_meta_box',					
		'title' => 'Add  Subtitle',					
		'pages' => array('post', 'page', 'portfolio'),			
		'context' => 'side',						
		'priority' => 'high',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Subtitle',
				'desc' => '',
				'id'   => $prefix . 'header_subtitle',
				'type' => 'text',
			),
			),
	);
	
	
	$meta_boxes[] = array(
		'id' => 'video_meta_box',
		'title' => 'Video',
		'pages' => array('post', 'Portfolio'), 
		'context' => 'normal',
		'priority' => 'low',
		'show_names' => false,
		'fields' => array(
			array(
				'name' => 'Video',
				'desc' => 'Paste your video embed code here.',
				'id' => $prefix . 'post_video',
				'type' => 'textarea_code'
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'port_custom_heading_meta_box',					
		'title' => 'Custom Heading',					
		'pages' => array('Portfolio',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Custom Heading',
				'desc' => '',
				'id'   => $prefix . 'custom_heading',
				'type' => 'text',
			),
	),
	);
	
	$meta_boxes[] = array(
		'id' => 'port_custom_meta_box',					
		'title' => 'Custom Field 1',					
		'pages' => array('Portfolio',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Title',
				'desc' => '',
				'id'   => $prefix . 'custom1_title',
				'type' => 'text',
			),
			array(
				'name' => 'Field',
				'desc' => '',
				'id'   => $prefix . 'custom1_body',
				'type' => 'text',
			),
	),
	);
	
	$meta_boxes[] = array(
		'id' => 'port_custom2_meta_box',					
		'title' => 'Custom Field 2',					
		'pages' => array('Portfolio',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Title',
				'desc' => '',
				'id'   => $prefix . 'custom2_title',
				'type' => 'text',
			),
			array(
				'name' => 'Field',
				'desc' => '',
				'id'   => $prefix . 'custom2_body',
				'type' => 'text',
			),
	),
	);
	
	$meta_boxes[] = array(
		'id' => 'port_custom3_meta_box',					
		'title' => 'Custom Field 3',					
		'pages' => array('Portfolio',),			
		'context' => 'side',						
		'priority' => 'low',		
		'show_names' => true, 
		'fields'     => array(
			array(
				'name' => 'Title',
				'desc' => '',
				'id'   => $prefix . 'custom3_title',
				'type' => 'text',
			),
			array(
				'name' => 'Field',
				'desc' => '',
				'id'   => $prefix . 'custom3_body',
				'type' => 'text',
			),
	),
	);
	

	return $meta_boxes;
	
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';
		
		function remove_metaboxes() {
 remove_meta_box( 'postcustom' , 'portfolio' , 'normal' ); 
}
add_action( 'admin_menu' , 'remove_metaboxes' );

}

