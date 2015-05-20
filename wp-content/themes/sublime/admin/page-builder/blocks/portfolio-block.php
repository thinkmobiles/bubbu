<?php
if(!class_exists('PG_Portfolio_Block')) {

	class PG_Portfolio_Block extends AQ_Block {
		function __construct() {
			$block_options = array(
				'name' => 'Portfolio',
				'size' => 'span12',
				'resizable' => 0,
			);
			
			//create the block
			parent::__construct('pg_portfolio_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				
				'title' => '',
				'number' => '',
				'columns' =>'3',
				'tag' => '',
				'portcolumns' => ''
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
		
			?>

<p>Note: You should only use this block on a full-width template</p>
<p class="description">
  <label for="<?php echo $this->get_field_id('title') ?>"> Title (optional)<br/>
    <input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
  </label>
</p>
<p class="description half">
  <label for="<?php echo $this->get_field_id('portcolumns') ?>"> Columns (2,3,4)<br/>
    <input id="<?php echo $this->get_field_id('portcolumns') ?>" class="input-full" type="text" value="<?php echo $portcolumns ?>" name="<?php echo $this->get_field_name('portcolumns') ?>">
  </label>
</p>
<p class="description half last">
  <label for="<?php echo $this->get_field_id('tag') ?>"> Tag<br/>
    <input id="<?php echo $this->get_field_id('tag') ?>" class="input-full" type="text" value="<?php echo $tag ?>" name="<?php echo $this->get_field_name('tag') ?>">
  </label>
</p>
<?php
		}
		
		function block($instance) {
			extract($instance);
			
			if($portcolumns == '3') {
		$portspan = '4';
		$portpic='Blog Pic';
		}
		
	elseif($portcolumns == '2') {
		$portspan = '6';
		$portpic='Large Pic';
		}
		else {
		$portspan = '3'; 
		
		$portpic= 'Blog Pic';
	}

		    ?>
<?php $f = 1; ?>
<div class="row-fluid">
<div class="post-row blog-row">
  <h4><?php echo $title; ?></h4>
  <div id="portfolioCarousel" class="carousel portfolioCarousel slide">
    <?php
	   $args = array('post_type' => 'portfolio', 'portfolio-tag' => $tag, 'posts_per_page' => '12'); 
query_posts($args);
if ( have_posts() ) : $f = 1;
global $post;?>
    
    <!-- Carousel items -->
    <div class="carousel-inner">
      <div class="<?php if($f=="1"){ echo 'active' ; } ?> item row-fluid">
        <?php  
    $tposts = new WP_Query($args);
	$count_post = $tposts->post_count;
	while ( $tposts->have_posts() ) : $tposts->the_post();  $postid = get_the_ID();?>
        <div class="span<?php echo $portspan; ?> post blogitem">
          <div class="portfolio-project">
            <?php $size = $portpic; // whatever size you want
             
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
    }
 ?>
            <div class="portfolio-project-mask"> <a class="project-zoom" href="<?php echo get_permalink() ?>"><i class="fa fa-external-link iconbg"></i></a> </div>
          </div>
          <div class="text-holder">
            <div class="text">
              <h4><a href="<?php echo get_permalink() ?>">
                <?php the_title(); ?>
                </a></h4>
             <p> <?php echo get_post_meta ($post->ID, 'tk_header_subtitle', true) ?></p> </div>
          </div>
          <?php
                if ( $portcolumns != 0 && ( $f % $portcolumns ) == 0 ) {
                	// if( $f/$portcolumns == $portcolumns ) { echo '</div>' ; } 
                	// else {
                	if( $f == $count_post )
						echo '</div>';
					else
                		echo '</div></div><div class="item row-fluid">' ;  
					// }
				} else { echo '</div>'; } 
		  ?>
          <?php $f++; endwhile;
		?>
        </div>
      </div>
      <?php 
		 endif; 
  if ($f > $portcolumns+1) {
							
							?>
      <!-- Carousel nav --> 
      <a class="carousel-control left" href="#portfolioCarousel" data-slide="prev">&larr;</a> <a class="carousel-control right" href="#portfolioCarousel" data-slide="next"> &rarr;</a>
    <?php
	}
	wp_reset_query();
	?>
    </div>
  </div>
</div>
<?php
			
$content = ob_get_contents();

	return $content;
			
		}
		
		function update($new_instance, $old_instance) {
			$new_instance['title'] = htmlspecialchars(stripslashes($new_instance['title']));
			return $new_instance;
		}
		
	}
}

