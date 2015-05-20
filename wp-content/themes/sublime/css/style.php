<?php 
header("Content-type: text/css;");
$current_url = dirname(__FILE__);
$wp_content_pos = strpos($current_url, 'wp-content');
$wp_content = substr($current_url, 0, $wp_content_pos);
require_once($wp_content . 'wp-load.php');

$highlight_color  = get_theme_mod('highlight_color');

$highlight_color  = get_theme_mod('highlight_color');
$header_color = get_theme_mod('sb_header_color');
$menu_color = get_theme_mod('navbar_color');
$menu_font_color = get_theme_mod('navfont_color');
$body_font  = get_theme_mod('body_font');


$header_image = get_theme_mod('custom_header_image');
?>
.header {background: <?php echo $menu_color;?>;  }
.navbar-inverse .navbar-inner {background: <?php echo $menu_color;?>;  }
.parallax {background: <?php echo $header_color;?>;  }
.navbar .nav > li > a {color: <?php echo $menu_font_color;?>;  }
body {font-family: "<?php echo $body_font;?>",Helvetica Neue, Helvetica,Arial,sans-serif;}
a { color: <?php echo $highlight_color;?>; }
.sidebar .widget ul li a:hover {color:<?php echo $highlight_color;?>;}
a:hover { color: <?php echo $highlight_color;?>;  }
.maskicons { background: <?php echo $highlight_color;?>;  }
#back-to-top:hover { background: <?php echo $highlight_color;?>;  }
.accordion-heading:hover { background: <?php echo $highlight_color;?>;  }
.header, .navbar-inverse .navbar-inner {background-color: <?php echo $header_bg;?>; }
.btn, #searchsubmit, #submit, .wpcf7-submit { background: <?php echo $highlight_color;?>;  }
.featurebox-icon { background: <?php echo $highlight_color;?>;  }
a.project-zoom { background-color: <?php echo $highlight_color;?>; color:#ffffff;  }
.filter-list li.active, .filter-list li:hover { background: <?php echo $highlight_color;?>;  }
.p-table-table .featured .p-table-header { background-color: <?php echo $highlight_color;?>;  }
.aq_block_tabs ul.aq-nav li.ui-tabs-active a { background-color: <?php echo $highlight_color;?>; }
.tabs-left > .nav-tabs .active > a, .tabs-left > .nav-tabs .active > a:hover { background-color: <?php echo $highlight_color;?>;  }
.aq_block_tabs ul.aq-nav li a { color: <?php echo $highlight_color;?>; }
.postdate { background: <?php echo $highlight_color;?>;  }
.phone { color: <?php echo $highlight_color;?>; }
.post-row .post .text .more-arrow a {color:<?php echo $highlight_color;?>;}
.pagination ul > li > a, .pagination ul > li > span {color:<?php echo $highlight_color;?>;}
.aq_block_toggle:hover .arrow, .aq_block_accordion:hover .arrow { background-color: <?php echo $highlight_color;?>;  }
.invert { background: <?php echo $highlight_color;?>!important;  }
.progress-striped .bar { background: <?php echo $highlight_color;?>;  }
.footer ul li:hover { border-left: 2px solid <?php echo $highlight_color;?>;  }
.left .span3 li a:hover{ color:<?php echo $highlight_color;?>; }
.right .span3 li a:hover { color:<?php echo $highlight_color;?>; }
.sidebar .tagcloud a:hover { border: 1px solid <?php echo $highlight_color;?>;}
.tabs-left > .nav-tabs > li a:hover{ color:<?php echo $highlight_color;?>; }
.footer .tagcloud a:hover { border: 1px solid <?php echo $highlight_color;?>;}
.client-banner {background-color: <?php echo $highlight_color;?>;}
.bgimage { background:url("<?php echo $header_image;?>") repeat; }
.shop-bar i:hover { background-color: <?php echo $highlight_color;?>; color:#ffffff; transition:all 0.2s ease-in-out 0s;}
.carousel-control:hover {background-color: <?php echo $highlight_color;?>;}
.centered:hover .ibackbg {background-color: <?php echo $highlight_color;?>;}
.slider2-handle { background-color: <?php echo $highlight_color;?>;  }
.navbar-inverse .brand, .navbar-inverse .nav > li > a:hover {color: <?php echo $highlight_color;?>;}
.dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a { background-color: <?php echo $highlight_color;?>;  }
.dropdown-menu .active > a, .dropdown-menu .active > a:hover { background: <?php echo $highlight_color;?>; }
#sub-menu ul li { background: <?php echo $highlight_color;?>; }
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus { border-color: <?php echo $highlight_color;?>!important; box-shadow:none!important;}
.label, .badge {background: <?php echo $highlight_color;?>;}