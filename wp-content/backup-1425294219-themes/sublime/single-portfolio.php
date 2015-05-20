<?php get_header(); setPostViews(get_the_ID());
global $wp;

$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
$pic_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>

<section class="bgimage parallax">
  <div class="container box">
    <h3><span>
      <?php the_title(); ?>
      </span></h3>
    <?php if(get_post_meta($post->ID, "tk_header_subtitle", true) ) { ?>
    <h2> <small><?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></small></h2>
    <?php };?>
  </div>
</section>
<div class="container box">
  <div class="row-fluid">
    <div class="span8">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="content">
        <div id="post-<?php the_ID(); ?>" <?php post_class('blog-post clearfix'); ?>>
          <div class="blog-inside clearfix">
            <div class="page-title page-title-portfolio">
            <?php if(get_post_meta($post->ID, "tk_post_video", true) ) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "tk_post_video", true));
	echo '</div>';       

                                                     } else  { 
             if ( has_post_thumbnail() ) {
    the_post_thumbnail();
} }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span4">
      <div class="portfolio-meta">
        <h3>
          <?php if (get_post_meta($post->ID, 'tk_custom_heading', true) ) ?>
          <?php echo get_post_meta($post->ID, 'tk_custom_heading', true) ?> </h3>
        <?php if (get_post_meta($post->ID, 'tk_custom1_title', true) ) : ?>
        <ul class="custom-meta-details">
			 <?php if (get_post_meta($post->ID, 'tk_custom1_title', true) ) : ?>
          <li>
            <h5 class="custom-meta"><?php echo get_post_meta($post->ID, 'tk_custom1_title', true) ?></h5>
            <?php echo get_post_meta($post->ID, 'tk_custom1_body', true) ?></li>
		<?php endif;?>
		 <?php if (get_post_meta($post->ID, 'tk_custom2_title', true) ) : ?>
          <li>
            <h5 class="custom-meta"><?php echo get_post_meta($post->ID, 'tk_custom2_title', true) ?></h5>
            <?php echo get_post_meta($post->ID, 'tk_custom2_body', true) ?></li>
		<?php endif; ?>
		 <?php if (get_post_meta($post->ID, 'tk_custom3_title', true) ) : ?>
          <li>
            <h5 class="custom-meta"><?php echo get_post_meta($post->ID, 'tk_custom3_title', true) ?></h5>
            <?php echo get_post_meta($post->ID, 'tk_custom3_body', true) ?></li>
		<?php endif; ?>
        </ul>
	 <?php endif; ?>
        <?php if($post->post_excerpt) the_excerpt(); ?>
      </div>
      <div class="share-social"> <span>Share:</span> <a href="http://twitter.com/home?status=Check%20This%20:+<?php echo $current_url; ?>" 
      target="_blank"> <i class="fa fa-twitter"></i></a> <a href="http://www.facebook.com/share.php?u=<?php echo $current_url; ?>" target="_blank"> <i class="fa fa-facebook"></i></a> <a href="https://plus.google.com/share?url=<?php echo $current_url; ?>" target="_blank"> <i class="fa fa-google-plus"></i></a> <a href="http://pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&media=<?php echo $pic_url; ?>&description=<?php the_title(); ?>" target="_blank"> <i class="fa fa-pinterest"></i></a> </div>
      <ul class="portfolio-sidebar-nav">
        <li>
          <?php next_post_link('%link', __('<span>Next:</span> %title', 'sublime')) ?>
        </li>
        <li>
          <?php previous_post_link('%link', __('<span>Previous:</span> %title', 'sublime')) ?>
        </li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="blog-entry">
          <div class="blog-content">
            <?php the_content(''); ?>
          </div>
        </div>
       
      </div>
    </div>
    <!-- sidebar -->
    
    <div class="clear"></div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <!-- container --> 
</div>
<script>

		//	Wrap the jQuery code in the generic function to allow use of 
		//  the $ shortcut in WordPress's no-conflict jQuery environment

		( function ($) {

			$('.gallery-item').delegate('img','click', function(){		// When someone clicks on a thumbnail

				$('.page-title-portfolio').attr('src',$(this).attr('src').replace('-150x150',''));	// Replace the Full Sized version of selected image

				$('.gallery-item img').removeClass("selected");				// Remove "selected" class from all thumbnails
				$(this).addClass("selected");								// Add "selected" class to selected thumnail

							
			});


			// Preload all other images in the slideshow so we don't have to wait
			// when we click on them. This also helps avoid awkward transitions 
			// when the description for the new image loads before the new image itself

		})(jQuery);

	</script>
<?php get_footer(); ?>
