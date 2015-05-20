<?php

if(!class_exists('PG_Posts_Block')) {
	class PG_Posts_Block extends AQ_Block {
		
		
		function __construct() {
			$block_options = array(
				'name' => 'Recent Posts',
				'size' => 'span12',
				'resizable' => 0,
			);
			
			//create the block
			parent::__construct('pg_posts_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				
				
					'number' => '',
					'columns' =>'4',
					'tagpost' => ''
					
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
  <label for="<?php echo $this->get_field_id('columns') ?>"> Columns (2,3,4)<br/>
    <input id="<?php echo $this->get_field_id('columns') ?>" class="input-full" type="text" value="<?php echo $columns ?>" name="<?php echo $this->get_field_name('columns') ?>">
  </label>
</p>
<p class="description half last">
  <label for="<?php echo $this->get_field_id('tagpost') ?>"> Tag (optional)<br/>
    <input id="<?php echo $this->get_field_id('tagpost') ?>" class="input-full" type="text" value="<?php echo $tagpost ?>" name="<?php echo $this->get_field_name('tagpost') ?>">
  </label>
</p>
<?php
		}
		
		function block($instance) {
			extract($instance);
			
		if($columns == '3') {
		$span = '4';
		$pic='Blog Pic';
		}
		
	elseif($columns == '2') {
		$span = '6';
		$pic='Large Pic';
		}
		else {
		$span = '3'; 
		
		$pic= 'Blog Pic';
	}
			
		    ?>
<div class="row-fluid">
<div class="post-row blog-row">
  <div id="postsCarousel" class="carousel postCarousel slide">
    <?php

$args = array('post_type'=> '',
            'ignore_sticky_posts'   => 1,
						'posts_per_page' => '12',
						'tag' => $tagpost
						);
query_posts($args);
if ( have_posts() ) : $d = 1; 
?>
    <!-- Carousel items -->
    <div class="carousel-inner">
      <div class="<?php if($d=="1"){ echo 'active' ; } ?> item row-fluid">
        <?php  
        $is_div = false;
        $rposts = new WP_Query( $args );
		$count_post = $rposts->post_count;
	while ( $rposts->have_posts() ) : $rposts->the_post();  ?>
        <div class="span<?php echo $span; ?> post blogitem">
          <div class="portfolio-project">
            <?php the_post_thumbnail($pic); ?>
            <div class="portfolio-project-mask"> <a class="project-zoom" href="<?php echo get_permalink() ?>"><i class="fa fa-external-link iconbg"></i></a> </div>
          </div>
          <div class="text-holder">
            <div class="text">
              <h4><a href="<?php echo get_permalink() ?>">
                <?php the_title(); ?>
                </a></h4>
              <?php custom_excerpt('regular') ?>
            </div>
          </div>
          <?php
                if ( $d != 0 && ( $d % $columns ) == 0 ) {
                		if( $d == $count_post ){
							echo '</div>'; 
						} else {
							echo '</div></div><div class="item row-fluid">' ;  
						} 
				}else{
					echo '</div>' ;
				} 
			?>
          <?php $d++; endwhile; ?>
        </div>
      </div>
      <?php endif; 
  if ($d > $columns+1) {
							
							?>
      <!-- Carousel nav --> 
      <a class="carousel-control left" href="#postsCarousel" data-slide="prev">&larr;</a> <a class="carousel-control right" href="#postsCarousel" data-slide="next">&rarr;</a>
      <?php
							}
						wp_reset_query();?>
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
