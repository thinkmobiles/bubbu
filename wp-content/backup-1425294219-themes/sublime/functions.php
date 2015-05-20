<?php
/*--------------------------*
/* A Few Directories
/*--------------------------*/

define('sublime_URL', get_template_directory() . '/');
define('sublime_ADMIN', sublime_URL . '/admin');
define('sublime_INCLUDES', sublime_URL . '/includes');

/*--------------------------*             							
/* CUSTOM BODY CLASS					                							
/*--------------------------*/
function sublime_body_class($classes) {
	$classes[] = 'sublimeFadeIn';
	return $classes;
}
add_filter('body_class','sublime_body_class');


/*--------------------------*
/* Image Sizes
/*--------------------------*/
if (!isset($content_width))
    $content_width = 900;
add_image_size('Blog Pic', 370, 250, true);
add_image_size('Tab Pic', 70, 51, true);
add_image_size('Portfolio Pic', 370, 300, true);
add_image_size('Large Pic', 600, 400, true);


/*--------------------------*
/* Load Scripts
/*--------------------------*/

function sublime_scripts_styles()
{
    
/*--------------------------*
/* Enqueu Styles
/*--------------------------*/
    
wp_enqueue_style('bootstrap_css', get_template_directory_uri() . "/css/bootstrap.min.css", array(), '0.1', 'screen');
wp_enqueue_style('bootstrap-responsive_css', get_template_directory_uri() . "/css/bootstrap-responsive.min.css", array(), '0.1', 'screen');
wp_enqueue_style('font_awesome_css', get_template_directory_uri() . "/css/font-awesome.min.css", 'screen');
wp_enqueue_style('style', get_stylesheet_uri());
wp_enqueue_style('custom_css', get_template_directory_uri() . "/css/style.php", 'screen');
 
/*--------------------------*
/* Google Fonts
/*--------------------------*/
    
   
    $body_font  = get_theme_mod('body_font');
   
    
    
    if (isset($body_font)) {
        wp_enqueue_style('font_' . $body_font, 'http://fonts.googleapis.com/css?family=' . $body_font);
    }
		

add_action( 'wp_enqueue_scripts', 'wpse_google_webfonts' );
    
    /*--------------------------*
    /* Register jQuery
    /*--------------------------*/
    wp_enqueue_script('jquery');
    
    /*--------------------------*
    /* Enqueu Scripts
    /*--------------------------*/
    wp_enqueue_script('modernizr_js', 'http://modernizr.com/downloads/modernizr-latest.js', false, false, true);
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', false, false, true);
				 wp_enqueue_script('iscroll_js', get_template_directory_uri() . '/js/iscroll.js', false, false, true);
				wp_enqueue_script('polyfill_js', get_template_directory_uri() . '/js/polyfill.requestAnimationFrame.js', false, false, true);
				wp_enqueue_script('superscrollama_js', get_template_directory_uri() . '/js/scrollorama/jquery.superscrollorama.js', false, false, true);
				wp_enqueue_script('tweenmax_js', get_template_directory_uri() . '/js/scrollorama/TweenMax.min.js', false, false, true);
		 wp_enqueue_script('form_js', get_template_directory_uri() . '/js/quicksand.js', false, false, true);
    wp_enqueue_script('plugins_js', get_template_directory_uri() . '/js/plugins.js', false, false, true);
    wp_enqueue_script('retina_js', get_template_directory_uri() . '/js/retina.js');
		wp_enqueue_script('flexslider_js', get_template_directory_uri() . '/js/jquery.flexslider.js');
		wp_enqueue_script('stellar_js', get_template_directory_uri() . '/js/jquery.stellar.js');
}
add_action('wp_enqueue_scripts', 'sublime_scripts_styles');

    /*--------------------------*
    /* Customizer Script
    /*--------------------------*/

 function sublime_customizer_live_preview()
{
	wp_enqueue_script( 
		  'sublime-themecustomizer', get_template_directory_uri().'/admin/customizer/js/sublime-customizer.js', array( 'jquery','customize-preview' ), '', true	);
}
add_action( 'customize_preview_init', 'sublime_customizer_live_preview' );
	

/*--------------------------*
/* Localization
/*--------------------------*/

load_theme_textdomain('sublime', get_template_directory() . '/languages');

/*--------------------------*
/* Register Menus
/*--------------------------*/

add_action('init', 'register_sublime_menus');

function register_sublime_menus()
{
    register_nav_menus(array(
        'menu-main' => __('Main Menu', 'sublime'),
								'menu-sub' => __('Sub Menu', 'sublime')
    ));
}

/*--------------------------*
/* Custom Walker Class
/*--------------------------*/

class sublime_Walker_Nav_Menu extends Walker_Nav_Menu
{
    
    function start_lvl(&$output, $depth= 0, $args = array())
    {
        $tabs = str_repeat("\t", $depth);
        
        if ($depth == 0 || $depth == 1) {
            $output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n";
        } else {
            $output .= "\n{$tabs}<ul>\n";
        }
        return;
    }
    
    
    function end_lvl(&$output, $depth= 0, $args = array())
    {
        if ($depth == 0) {
            
            
            $output .= '<!--.dropdown-->';
        }
        $tabs = str_repeat("\t", $depth);
        $output .= "\n{$tabs}</ul>\n";
        return;
    }
    
    
    function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0)
    {
        global $wp_query;
        $indent      = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes     = empty($object->classes) ? array() : (array) $object->classes;
        
        
        if ($object->hasChildren) {
            $classes[] = 'dropdown';
            
            if ($depth == 1) {
                $classes[] = 'dropdown-submenu';
            }
        }
        
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $object));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $output .= $indent . '<li id="menu-item-' . $object->ID . '"' . $value . $class_names . '>';
        $attributes = !empty($object->attr_title) ? ' title="' . esc_attr($object->attr_title) . '"' : '';
        $attributes .= !empty($object->target) ? ' target="' . esc_attr($object->target) . '"' : '';
        $attributes .= !empty($object->xfn) ? ' rel="' . esc_attr($object->xfn) . '"' : '';
        $attributes .= !empty($object->url) ? ' href="' . esc_attr($object->url) . '"' : '';
        $args        = (object) $args;
        $object_output = $args->before;
        
        
        if ($object->hasChildren && $depth == 0) {
            $object_output .= '<a' . $attributes . ' class="dropdown-toggle" data-hover="dropdown">';
        } else {
            $object_output .= '<a' . $attributes . '>';
        }
        
        $object_output .= $args->link_before . apply_filters('the_title', $object->title, $object->ID) . $args->link_after;
        
        
        if ($object->hasChildren && $depth == 0) {
            $object_output .= '<b class="caret"></b></a>';
        } else {
            $object_output .= '</a>';
        }
        
        $object_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $object_output, $object, $depth, $args);
        return;
    }
    
    
    function end_el(&$output, $object, $depth= 0, $args = array())
    {
        $output .= '</li>';
        return;
    }
    
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        
        
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}


/*--------------------------*
/* Bootstrap Active Class
/*--------------------------*/

add_filter('nav_menu_css_class', 'add_active_class', 10, 2);
function add_active_class($classes, $object)
{
    if ($object->menu_object_parent == 0 && in_array('current-menu-item', $classes)) {
        $classes[] = "active";
    }
    return $classes;
}


/*--------------------------*
/* Register Post Types
/*--------------------------*/


if ( ! function_exists('custom_post_type') ) {

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Porfolio', 'sublime' ),
		'singular_name'       => _x( 'portfolio', 'sublime' ),
		'menu_name'           => __( 'Portfolio', 'sublime' ),
		'parent_item_colon'   => __( 'Parent Portfolio', 'sublime' ),
		'all_items'           => __( 'All Portfolio', 'sublime' ),
		'view_item'           => __( 'View Portfolio', 'sublime' ),
		'add_new_item'        => __( 'Add New Portfolio', 'sublime' ),
		'add_new'             => __( 'New Portfolio', 'sublime' ),
		'edit_item'           => __( 'Edit Portfolio', 'sublime' ),
		'update_item'         => __( 'Update Portfolio', 'sublime' ),
		'search_items'        => __( 'Search portfolios', 'sublime' ),
		'not_found'           => __( 'No portfolios found', 'sublime' ),
		'not_found_in_trash'  => __( 'No portfolios found in Trash', 'sublime' ),
	);
	$rewrite = array(
		'slug'                => 'portfolio',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'portfolio', 'sublime' ),
		'description'         => __( 'portfolio information pages', 'sublime' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon' => get_template_directory_uri() . '/admin/images/functions/portfolio-ico.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

}


add_action('init', 'portfolio_add_cats');

function portfolio_add_cats()
{
    
    
    register_taxonomy("portfolio_categories", array(
        "portfolio"
    ), array(
        "hierarchical" => true,
        "label" => "Portfolio Categories",
        "rewrite" => true
    ));
}

register_taxonomy('portfolio-tag', array(
    'portfolio'
), array(
    'hierarchical' => false,
    'labels' => array(
        'name' => _x('portfolio Tags', 'taxonomy general name', 'sublime'),
        'singular_name' => _x('portfolio Tag', 'taxonomy singular name', 'sublime'),
        'search_items' => __('Search portfolio Tags', 'sublime'),
        'all_items' => __('All portfolio Tags', 'sublime'),
        'edit_item' => __('Edit portfolio Tag', 'sublime'),
        'update_item' => __('Update portfolio Tag', 'sublime'),
        'add_new_item' => __('Add New portfolio Tag', 'sublime'),
        'new_item_name' => __('New portfolio Tag Name', 'sublime'),
        'menu_name' => __('portfolio Tags', 'sublime')
    ),
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array(
        'slug' => 'portfolio-tag',
        'with_front' => true
    )
));



/*--------------------------*
/* Register Widget Areas
/*--------------------------*/

if (function_exists('register_sidebars'))
    register_sidebar(array(
        'name' => 'Sidebar',
        'description' => 'Widgets in this area will be shown in the sidebar.',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-heading"><h5 class="widget-title">',
        'after_title' => '</h5></div>'
    ));

register_sidebar(array(
    'name' => 'Footer',
    'description' => 'Widgets in this area will be shown in the footer.',
    'before_widget' => '<div class="span2"><div class="widget">',
    'after_widget' => '</div></div>',
    'before_title' => '<h5 class="widget-title">',
    'after_title' => '</h5>'
));

register_sidebar(array(
    'name' => 'Footer-Left',
    'description' => 'Large footer left area.',
    'before_widget' => '<div class="span6"><div class="widget">',
    'after_widget' => '</div></div>',
    'before_title' => '<h5 class="widget-title">',
    'after_title' => '</h5>'
));


/*--------------------------*
/* Metaboxes
/*--------------------------*/

require_once(sublime_ADMIN . '/metabox/meta.php');

/*--------------------------*
/* Dynamic Sidebars
/*--------------------------*/

require_once(sublime_ADMIN . '/sidebars/sbars.php');

/*--------------------------*
/* Plugins
/*--------------------------*/

require_once(sublime_INCLUDES . '/plugins/plugin.php');


/*--------------------------*
/* Image Size Filter
/*--------------------------*/

add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);

function remove_width_attribute($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

add_theme_support('post-thumbnails');

/*--------------------------*
/* Tags/Comments
/*--------------------------*/

require_once(sublime_INCLUDES . '/tags-comments/tags.php');

/*--------------------------*
/* Excerpt Length
/*--------------------------*/

class Excerpt
{
    
    public static $length = 15;
    
    public static $types = array('short' => 5, 'regular' => 15, 'blog' =>'35', 'long' => 50);
    
    public static function length($new_length = 15)
    {
        Excerpt::$length = $new_length;
        
        add_filter('excerpt_length', 'Excerpt::new_length');
        
        Excerpt::output();
    }
    
    public static function new_length()
    {
        if (isset(Excerpt::$types[Excerpt::$length]))
            return Excerpt::$types[Excerpt::$length];
        else
            return Excerpt::$length;
    }
    
    public static function output()
    {
        the_excerpt();
    }
    
}

function custom_excerpt($length = 15)
{
    Excerpt::length($length);
}
// Changing excerpt more

   function new_excerpt_more($more) {

   global $post;

   return '<span class="more-arrow"> <a href="'. get_permalink($post->ID) . '">' . '&rarr;' . '</a></span>';

   }

   add_filter('excerpt_more', 'new_excerpt_more');

/*--------------------------*
/* Shortcodes
/*--------------------------*/


require_once(sublime_ADMIN . '/shortcodes/buttons/buttons.php');
require_once(sublime_ADMIN . '/shortcodes/icons/icons.php');
require_once(sublime_ADMIN . '/shortcodes/sales/sales.php');

add_filter('widget_text', 'do_shortcode');

function shortcode_empty_paragraph_fix($content)
{
    $array   = array(
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

/*--------------------------*
/* Widgets
/*--------------------------*/

require_once(sublime_ADMIN . '/widgets/flickr/flickr.php');
require_once(sublime_ADMIN . '/widgets/tabs/tabs.php');

/*--------------------------------------*/
/*    Customizer Support
/*--------------------------------------*/

require_once(dirname(__FILE__) . "/admin/customizer/customizer.php");
add_editor_style();

/**
 * Page Builder
 */
require_once(sublime_ADMIN . '/page-builder/page-builder.php');

/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/
function wpex_clean_shortcodes($content)
{
    $array   = array(
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');

/*--------------------------*
/* Default RSS link
/*--------------------------*/
add_theme_support('automatic-feed-links');

/*-----------------------*/
/* Popular Posts
/*-----------------------*/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "<span>0</span>";
    }
    return '<span><i class="icon-eye-open"></i> '. $count.'</span> ';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
/*--------------------------*
/* Custom Admin
/*--------------------------*/
function sublime_custom_admin_css()
 {
 echo '<style type="text/css">
	.screenshot {max-width:92%;} 
    .screenshot img {max-width:100%;}
             </style>';
 }
add_action('admin_head', 'sublime_custom_admin_css');
/*--------------------------*
/* Blank Search Function
/*--------------------------*/

function make_blank_search($query)
{
    global $wp_query;
    if (isset($_GET['s']) && $_GET['s'] == '') {
        $wp_query->set('s', ' ');
        $wp_query->is_search = true;
    }
    return $query;
}
add_action('pre_get_posts', 'make_blank_search');

/*--------------------------*
/* Search Form Fixes
/*--------------------------*/

function rv_search_form($form)
{
    
    $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:', 'sublime') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" class="btn" value="' . esc_attr__('Search', 'sublime') . '" />
    </div>
    </form>';
    
    return $form;
}

function get_fbimage() {
  if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
  $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', '' );
  $fbimage = $src[0];
  } else {
    global $post, $posts;
    $fbimage = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
    $post->post_content, $matches);
    $fbimage = $matches [1] ;
  }
  if(empty($fbimage)) {
	
    $fbimage =  get_template_directory_uri().'/img/no-img.jpg';
  }
  return $fbimage;
}
add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'li',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'Large Pic',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
              
                text-align: center;
                width: {$itemwidth}%;           }
            #{$selector} img {
                border: none;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        <!-- see gallery_shortcode() in wp-includes/media.php -->
        <div id='gallery-wrap'><div id='$selector' class='gallery slides galleryid-{$id}'>");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '';
    }

    $output .= "
           
        </div></div>\n";

    return $output;
}

function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1; 
     $additional_loop = '';
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
		 echo "<ul class='page-numbers'>";
     {
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'> &larr;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'> &larr;</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class=\"current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\"> &rarr;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'> &rarr;</a>";
     }
		  echo "</ul>";
}

function has_gallery($post_id = false) {
    if (!$post_id) {
        global $post;
    } else {
        $post = get_post($post_id);
    }
    return ( strpos($post->post_content,'[gallery') !== false); 
}