<?php

add_action( 'customize_register', 'sublime_theme_customizer_register' );

function sublime_theme_customizer_register($wp_customize) {
	
require_once(sublime_ADMIN . '/customizer/google-fonts.php');
	
     //sublime Options
  $wp_customize->add_section( 'sublime_theme_customizer_basic', array(
		'title' => __( 'Logo & Favicon', 'sublime' ),
		'priority' => 100
	) );
	
	//Logo Image
	$wp_customize->add_setting( 'logo_image', array( 
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image', array(
		'label' => __( 'Logo Upload', 'sublime' ),
		'section' => 'sublime_theme_customizer_basic',
		'settings' => 'logo_image'
		
	) ) );
	
	//Favicon Image
	$wp_customize->add_setting( 'favicon_image', array( 
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon_image', array(
		'label' => __( 'Favicon Upload', 'sublime' ),
		'section' => 'sublime_theme_customizer_basic',
		'settings' => 'favicon_image',
		
	) ) );
	

	
	//Highlight Color
  $wp_customize->add_setting( 'highlight_color', array(
	'default' => '#24C5BA',
	'sanitize_callback' => 'sanitize_hex_color',
	 'transport' => 'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'highlight_color', array(
		'label'   => __( 'Highlight Color', 'sublime' ),
		'section' => 'colors',
		'settings'   => 'highlight_color'
		
	) ) );
	
	//Navbar Color
  $wp_customize->add_setting( 'navbar_color', array(
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	 'transport' => 'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navbar_color', array(
		'label'   => __( 'Menu Bar Color', 'sublime' ),
		'section' => 'colors',
		'settings'   => 'navbar_color'
		
	) ) );
	
	//Navbar Color
  $wp_customize->add_setting( 'navfont_color', array(
	'default' => '#FFFFFF',
	'sanitize_callback' => 'sanitize_hex_color',
	 'transport' => 'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navfont_color', array(
		'label'   => __( 'Menu Font Color', 'sublime' ),
		'section' => 'colors',
		'settings'   => 'navfont_color'
		
	) ) );
	
	//Header Color
  $wp_customize->add_setting( 'sb_header_color', array(
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	 'transport' => 'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sb_header_color', array(
		'label'   => __( 'Subpage Header Color', 'sublime' ),
		'section' => 'colors',
		'settings'   => 'sb_header_color'
		
	) ) );
	//Pages
	$wp_customize->add_section( 'sublime_theme_customizer_pages', array(
		'title' => __( 'Pages', 'sublime' ),
		'priority' => 200
	) );
	
	//Banner Heading
	$wp_customize->add_setting( 'banner_heading', array(
		'default' => 'Add Banner Test Here',
		'transport'=>'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_heading', array(
		'label'   => __( 'Homepage Banner Heading (under slider)', 'sublime' ),
		'section' => 'sublime_theme_customizer_pages',
		'settings'   => 'banner_heading'
		 
	) ) );
	
	//Subheading
	$wp_customize->add_setting( 'banner_subheading', array(
		'default' => 'Add SubHeading Here',
		'transport'=>'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner_subheading', array(
		'label'   => __( 'Banner Subheading', 'sublime' ),
		'section' => 'sublime_theme_customizer_pages',
		'settings'   => 'banner_subheading',
		
	) ) );
	
	//Header Image
	$wp_customize->add_setting( 'custom_header_image', array( 
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_header_image', array(
		'label' => __( 'Header Image Upload', 'sublime' ),
		'section' => 'sublime_theme_customizer_pages',
		'settings' => 'custom_header_image'
		
	) ) );
	
	//Slider Slug
	$wp_customize->add_setting( 'slider_slug', array(
		'default' => 'slider1'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_slug', array(
		'label'   => __( 'Slider Slug', 'sublime' ),
		'section' => 'sublime_theme_customizer_pages',
		'settings'   => 'slider_slug',
		
	) ) );
	
	//Gallery Columns
	$wp_customize->add_setting( 'gallery_columns', array(
		'default' => '3'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gallery_columns', array(
		'label'   => __( 'Gallery Columns', 'sublime' ),
		'section' => 'sublime_theme_customizer_pages',
		'settings'   => 'gallery_columns',
		'type' => 'select',
	  'choices'     => array(
				'2'  => __( 'Two', 'sublime' ),
				'3' => __( 'Three', 'sublime' ),
				'4' => __( 'Four', 'sublime' )
			),
	) ) );
	
	//Sidebars
	$wp_customize->add_section( 'sublime_theme_customizer_sidebar', array(
		'title' => __( 'Sidebar', 'sublime' ),
		'priority' => 400
	) );
	
	$wp_customize->add_setting( 'sidebar_selection', array(
		'default' => 'sidebar-right'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_selection', array(
		'label'   => __( 'Global Sidebar Setting', 'sublime' ),
		'section' => 'sublime_theme_customizer_sidebar',
		'type' => 'radio',
		'settings'   => 'sidebar_selection',
		'choices'     => array(
				'sidebar-left'  => __( 'Sidebar on left', 'sublime' ),
				'sidebar-right' => __( 'Sidebar on right', 'sublime' )
			),
	) ) );
	
	//Typography
	$wp_customize->add_section( 'sublime_theme_customizer_typography', array(
		'title' => __( 'Typography', 'sublime' ),
		'priority' => 500
	) );
	
	$wp_customize->add_setting( 'body_font', array(
		'default' => '"Helvetica Neue", Helvetica, Arial, sans-serif',
		'transport'=>'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'body_font', array(
		'label'   => __( 'Select a Font', 'sublime' ),
		'section' => 'sublime_theme_customizer_typography',
		'type' => 'select',
		'settings'   => 'body_font',
	  'choices'   =>  
            $googlefonts
            ,
	) ) );
    
    
    //Download button
	$wp_customize->add_section( 'sublime_theme_customizer_downloads', array(
		'title' => __( 'Download button', 'sublime' ),
		'priority' => 600
	) );
    
    $wp_customize->add_setting( 'android_url', array(
		'default' => 'http://',
		'transport'=>'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'android_url', array(
		'label'   => __( 'Android url', 'sublime' ),
		'section' => 'sublime_theme_customizer_downloads',
		'settings'   => 'android_url',
		
	) ) );
    
    $wp_customize->add_setting( 'android_image', array( 
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'android_image', array(
		'label' => __( 'Android Upload', 'sublime' ),
		'section' => 'sublime_theme_customizer_downloads',
		'settings' => 'android_image'
		
	) ) );
    
    $wp_customize->add_setting( 'ios_url', array(
		'default' => 'http://',
		'transport'=>'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ios_url', array(
		'label'   => __( 'iOS url', 'sublime' ),
		'section' => 'sublime_theme_customizer_downloads',
		'settings'   => 'ios_url',
		
	) ) );
    
    $wp_customize->add_setting( 'ios_image', array( 
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ios_image', array(
		'label' => __( 'iOS Upload', 'sublime' ),
		'section' => 'sublime_theme_customizer_downloads',
		'settings' => 'ios_image'
		
	) ) );
    
	
	
	//Footer
	$wp_customize->add_section( 'sublime_theme_customizer_footer', array(
		'title' => __( 'Footer', 'sublime' ),
		'priority' => 600
	) );
	
	$wp_customize->add_setting( 'copyright_text', array(
		'default' => 'Copyright 2013',
		'transport'=>'postMessage'
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright_text', array(
		'label'   => __( 'Copyright Text', 'sublime' ),
		'section' => 'sublime_theme_customizer_footer',
		'settings'   => 'copyright_text',
		
	) ) );
	
	//Social Settings
	$wp_customize->add_section( 'sublime_theme_customizer_social', array(
		'title' => __( 'Social Settings', 'sublime' ),
		'priority' => 700
	) );
	
	$wp_customize->add_setting( 'twitter_text', array(
		'default' => '',
		 'priority' => 1
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_text', array(
		'label'   => __( 'Twitter username', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'twitter_text',
		
	) ) );
	
	
	$wp_customize->add_setting( 'facebook_text', array(
		'default' => '',
		 'priority' => 3
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_text', array(
		'label'   => __( 'Facebook username', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'facebook_text',
		
	) ) );
	
	$wp_customize->add_setting( 'linkedin_text', array(
		'default' => '',
		 'priority' => 4
		
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin_text', array(
		'label'   => __( 'Linkedin url', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'linkedin_text',
		
	) ) );
	
	$wp_customize->add_setting( 'pinterest_text', array(
		'default' => '',
		 'priority' => 5
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest_text', array(
		'label'   => __( 'Pinterest url', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'pinterest_text',
		
	) ) );
	
	$wp_customize->add_setting( 'google1_text', array(
		'default' => '',
		 'priority' => 6
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google1_text', array(
		'label'   => __( 'Google1 url', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'google1_text',
		
	) ) );
	
	$wp_customize->add_setting( 'github_text', array(
		'default' => '',
		 'priority' => 7
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'github_text', array(
		'label'   => __( 'Github url', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'github_text',
		
	) ) );
	
	$wp_customize->add_setting( 'instagram_text', array(
		'default' => '',
		 'priority' => 8
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_text', array(
		'label'   => __( 'Instagram url', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'instagram_text',
		
	) ) );
	
	$wp_customize->add_setting( 'youtube_text', array(
		'default' => '',
		 'priority' => 9
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube_text', array(
		'label'   => __( 'YouTube url', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'youtube_text',
		
	) ) );
	
	$wp_customize->add_setting( 'rss_text', array(
		'default' => '',
		 'priority' => 10
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss_text', array(
		'label'   => __( 'RSS feed', 'sublime' ),
		'section' => 'sublime_theme_customizer_social',
		'settings'   => 'rss_text',
		
	) ) );
	
	
	//Real Time Settings Preview
	
	$wp_customize->get_setting('blogname')->transport='postMessage';	
	$wp_customize->remove_control( 'header_textcolor');
  $wp_customize->remove_control( 'display_header_text');
	$wp_customize->remove_control( 'background_color');
	 $wp_customize->remove_section( 'background_image');
}
