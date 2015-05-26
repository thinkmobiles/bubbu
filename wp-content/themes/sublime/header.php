<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php wp_title( '|', true, 'right' ); ?>
<?php echo bloginfo( 'name' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="<?php echo get_theme_mod('favicon_image'); ?>">
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" />
<![endif]-->

</head>

<body <?php body_class(); ?>>
<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<div class="header">
<div class="container">
    <div class="navbar navbar-inverse navbar-fadein">
   

      
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        
        <?php /*$logo  = get_theme_mod('logo_image'); 
		if(!empty($logo)) { ?>
        <a class="brand" href="<?php echo home_url(); ?>"> <img class="a" src="<?php echo $logo;?>" alt=""> </a>
        <?php }
		 else { ?>
        <div class="logo-text"> </div>
        <?php }*/?>
        
        <div class="nav">
          <?php  wp_nav_menu( array( 'walker' => new sublime_walker_nav_menu(), 'theme_location' => 'menu-main', 'container_class' => 'nav-collapse', 'menu_class' => 'nav', 'menu_id' => 'main-menu')); ?>
        </div>
      </div>
    </div>
  </div>
</div>
