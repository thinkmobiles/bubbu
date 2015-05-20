<?php 
/* 
Template Name: Portfolio
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
<div class="container box">
  <div class="row">
    <div class="span12">
      <div class="fullwidth">
        <div class="filter-bar clearfix">
          <ul class="filter-list filter clearfix">
            <li class="reset active all-projects"><i class="icon-refresh"></i></li>
            <?php 
									$args = array( 'taxonomy' => 'portfolio_categories' );
							        $terms = get_terms('portfolio_categories', $args);
							        $count = count($terms); $i=0;
							        if ($count > 0) {
							            $term_list = '';
							            foreach ($terms as $term) {
							                $i++;
							                $term_list .= '<li class="cat-item '. $term->name .'"><a href="#" class="'. $term->name .'">' . $term->name . '</a></li>';
							                if ($count != $i) $term_list .= ''; else $term_list .= '';
							            }
							            echo $term_list;
							        }
								?>
          </ul>
        </div>
        <div class="row">
          <div class="portfolio-full">
            <div class="filter-posts">
              <?php
							$galcolumns  = get_theme_mod('gallery_columns');
							 if($galcolumns == '3') {
		$galspan = '4';
		}
		
	elseif($galcolumns == '2') {
		$galspan = '6';
		}
		else {
		$galspan = '3'; 
	}
	
									if ( get_query_var('paged') ) {
									    $paged = get_query_var('paged');
									} else if ( get_query_var('page') ) {
									    $paged = get_query_var('page');
									} else {
									    $paged = 1;
									}
									
									$args = array('post_type' => 'portfolio', 'posts_per_page' => 15, 'paged' => $paged );
									
									$temp = $wp_query; 
									$wp_query = null; 
									$wp_query = new WP_Query(); 
									$wp_query->query( $args ); 
									
									while ($wp_query->have_posts()) : $wp_query->the_post(); 
								?>
              <div class="project span<?php echo $galspan; ?>" data-id="post-<?php the_ID(); ?>" <?php echo 'data-type="'.$terms_as_text = strip_tags( get_the_term_list( $post->ID, 'portfolio_categories', '', ' ', '' ) ).'"'; ?>>
                <div class="portfolio-project">
                <?php if(get_post_meta($post->ID, "tk_post_video", true) ) {
	echo '<div class="video2">';
	echo stripslashes(get_post_meta($post->ID, "tk_post_video", true));
	echo '</div>';       

                                                     } else  { $size = 'Large Pic'; 
if ( has_post_thumbnail() ) {
    the_post_thumbnail( $size );
} else {
    $attachments = get_children( array(
        'post_parent' => get_the_ID(),
        'post_status' => 'inherit',
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'numberposts' => 1)
    );
    foreach ( $attachments as $thumb_id => $attachment )
        echo wp_get_attachment_image($thumb_id, $size);
    }  }
 ?>
               <?php if(get_post_meta($post->ID, "tk_post_video", true) ) { } else { ?>   <div class="portfolio-project-mask"> <a class="project-zoom" href="<?php echo get_permalink() ?>"><i class="fa fa-external-link iconbg"></i></a> </div> <?php } ?>
                </div>
                <div class="project-summary">
                  <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                    </a></h4>
                  <p><?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></p>
                </div>
              </div>
              <?php		     
						         endwhile; ?>
            </div>
          </div>
        </div>
      </div>
      <?php 
						  $wp_query = null; 
						  $wp_query = $temp;  // Reset
						?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
