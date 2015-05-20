<?php
/*
Template Name: Page with sidebar
*/
?>
<?php get_header();?>

<section class="bgimage parallax">
  <div class="container box">
    <h3><span>
      <?php the_title(); ?>
      </span></h3>
    <?php if(get_post_meta($post->ID, "tk_header_subtitle", true) ) { ?>
    <h2> <small><?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></small></h2>
    <?php }; ?>
  </div>
</section>
<?php $sidebar_location =  get_theme_mod('sidebar_selection');
						if ($sidebar_location == "sidebar-right") {
						?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container box">
<div class="row left">
<div class="span9 text-post">
  <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
  <?php the_post_thumbnail(); }?>
  <?php the_content(); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_sidebar();
				  } elseif ($sidebar_location == "sidebar-left") {
						
					?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="container box">
<div class="row right">
  <?php get_sidebar(); ?>
  <div class="span9 text-post">
    <?php if(get_post_meta($post->ID, "ad_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "ad_post_video", true));
	echo '</div>';       

                                                     } else { ?>
    <?php the_post_thumbnail(); }?>
    <?php the_content(); ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
  <?php	 }?>
</div>
<?php get_footer();?>
