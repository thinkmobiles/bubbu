<?php


if(class_exists('AQ_Page_Builder')) {
	define('SUBLIME_PB_DIR', get_template_directory() . '/admin/page-builder/');
	define('SUBLIME_PB_URI', get_template_directory_uri() . '/admin/page-builder/');
	
	//include the block files
	
	
	require_once(SUBLIME_PB_DIR . 'blocks/testimonial-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/pricetable-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/video-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/googlemap-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/contact-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/portfolio-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/posts-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/heading-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/image-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/team-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/twitter-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/features-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/banner-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/tabs-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/progressbar-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/stretchbanner-block.php');
	require_once(SUBLIME_PB_DIR . 'blocks/clients-block.php');
	
	//register the blocks
	

	aq_register_block('PG_Testimonial_Block');
	aq_register_block('PG_Pricetable_Block');
	aq_register_block('PG_Video_Block');
  aq_register_block('PG_Portfolio_Block');
	aq_register_block('PG_Posts_Block');
	aq_register_block('PG_Contact_Block');
	aq_register_block('PG_Googlemap_Block');
  aq_register_block('PG_Banner_Block');
	aq_register_block('PG_Heading_Block');
	aq_register_block('PG_Image_Block');
	aq_register_block('PG_Team_Block');
	aq_register_block('PG_Twitter_Block');
	aq_register_block('PG_Features_Block');
	aq_register_block('PG_Tabs_Block');
	aq_register_block('PG_Progressbar_Block');
	aq_register_block('PG_Stretchbanner_Block');
	aq_register_block('PG_Clients_Block');
	
	//unregister blocks
	
	aq_unregister_block('AQ_Tabs_Block');
	
}
