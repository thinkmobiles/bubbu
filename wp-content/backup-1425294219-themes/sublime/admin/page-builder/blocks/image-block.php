<?php

if(!class_exists('PG_Image_Block')) {
	class PG_Image_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Image',
				'size' => 'span6',
			);
			
			parent::__construct('pg_image_block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'img' => ''
				
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>

<p class="description half">
  <label for="<?php echo $this->get_field_id('title') ?>"> Title (optional)<br/>
    <?php echo aq_field_input('title', $block_id, $title) ?> </label>
</p>
<p class="description half">
  <label for="<?php echo $this->get_field_id('img') ?>"> Upload an image<br/>
    <?php echo aq_field_upload('img', $block_id, $img) ?> </label>
  <?php if($img) { ?>
<div class="screenshot"> <img src="<?php echo $img ?>" /> </div>
<?php } ?>
</p>
<p class="description half">
		<label for="<?php echo $this->get_field_id('image_url') ?>">
			Optional Link<br/>
			<?php echo aq_field_input('image_url', $block_id, $image_url) ?>
		</label>
	</p>
<?php
		}
		
		function block($instance) {
			extract($instance);
			
			$stringi = sprintf( __('%s', 'sublime'), $title );
			if($title) echo '<h4>'.strip_tags($stringi).'</h4>';
			if( $image_url ) {
				
				echo '<a href="'.htmlspecialchars_decode($image_url) .'" rel="nofollow" ><img src="'.$img.'" /></a>';
			} else {
			echo '<img src="'.$img.'" />';
		}
		}
		
		
	}
}