<?php get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="bgimage parallax" data-stellar-background-ratio="0.5">
  <div class="container box">
    <h3><span>
      <?php the_title(); ?>
      </span></h3>
    <?php if(get_post_meta($post->ID, "tk_header_subtitle", true) ) { ?>
    <h2> <small><?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></small></h2>
    <?php }; ?>
  </div>
</section>
<div class="container box">
<div class="row">
  <div class="span12">
    <div class="fullwidth">
      <?php if(get_post_meta($post->ID, "tk_post_video", true) && is_single()) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "tk_post_video", true));
	echo '</div>';       

                                                     } else { ?>
      <?php the_post_thumbnail('', array('class' => 'full-thumb')); } ?>
    </div>
    <?php the_content(); ?>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</div>
<?php get_footer();?>
