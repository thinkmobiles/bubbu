<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php wp_title('|', true, 'right'); ?>
            <?php echo bloginfo('name'); ?>-<?php echo bloginfo('description'); ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="<?php echo get_theme_mod('favicon_image'); ?>">
        <?php if (is_singular()) wp_enqueue_script('comment-reply');
        wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lte IE 8]>
            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" />
        <![endif]--> 
        <!--[if lt IE 7]>
                    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
                <![endif]-->
        <div class="header">


            <div class="container">
                <div class="navbar navbar-inverse navbar-fadein">



                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php /* $logo  = get_theme_mod('logo_image'); 
                      if(!empty($logo)) { ?>
                      <a class="brand" href="<?php echo home_url(); ?>"> <img class="a" src="<?php echo $logo;?>" alt=""> </a>
                      <?php }
                      else { ?>
                      <div class="logo-text"> </div>
                      <?php } */ ?>


                    <div class="nav">
<?php wp_nav_menu(array('walker' => new sublime_walker_nav_menu(), 'theme_location' => 'menu-main', 'container_class' => 'nav-collapse', 'menu_class' => 'nav', 'menu_id' => 'main-menu')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php $slider = get_theme_mod('slider_slug'); ?>
    <div id="slider">
<?php putRevSlider($slider) ?>

        <?php 
            $android_img  = get_theme_mod('android_image');            
            $ios_img  = get_theme_mod('ios_image');
            $android_url  = get_theme_mod('android_url');            
            $ios_url  = get_theme_mod('ios_url');
            $logo  = get_theme_mod('logo_image');
        ?>    
         <div class="brandList">   
		<?php if(!empty($logo)):?>
            <a class="brand center" href="<?php echo home_url(); ?>"> <img class="a" src="<?php echo $logo;?>" alt="" width="412"> </a>
        <?php endif;?>
            
        <img src="<?php bloginfo('template_directory'); ?>/img/Download-on.png" class="brand title center"/>
        <div class="left">
        <?php if(!empty($android_img)):?>
         <a class="brand" href="<?php echo $ios_url; ?>"> <img class="a" src="<?php echo $ios_img;?>" alt="" width="354"> </a>
   
        <?php endif;?>
        </div>
        <div class="right">
        <?php if(!empty($ios_img)):?>
                      <a class="brand" href="<?php echo $android_url; ?>"> <img class="a" src="<?php echo $android_img;?>" alt="" width="346"> </a>
  
          <?php endif;?>
        </div>
         </div>
        
        

        <div class="clear"></div>
    </div>
