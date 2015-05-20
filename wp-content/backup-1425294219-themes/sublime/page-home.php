<?php
/*
Template Name: Home Page
*/
?>
<?php get_header('homepage');?>
<?php $banner  = get_theme_mod('banner_heading');  ?>
<?php $banner_sub  = get_theme_mod('banner_subheading'); ; ?>

<div class="container home-main">
<div class="banner-home">
  <div class="container box">
    <h3> <?php echo $banner; ?></h3>
    <h2> <small><?php echo $banner_sub; ?></small></h2>
  </div>
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer();?>
