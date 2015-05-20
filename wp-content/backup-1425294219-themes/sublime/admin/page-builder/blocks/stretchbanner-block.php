<?php

if(!class_exists('PG_Stretchbanner_Block')) {
	class PG_Stretchbanner_Block extends AQ_Block {
		
		
		function __construct() {
			$block_options = array(
				'name' => 'Stretch Banner',
				
				'resizable' => 0,
			);
			
			//create the block
			parent::__construct('pg_stretchbanner_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				
				  'title' =>'',
					'img' => '',
					'text' =>''	,
					'parallax_background' =>''
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
	
			?>

<p>Note: You should only use this block on a full-width template</p>
<p class="description half">
  <label for="<?php echo $this->get_field_id('title') ?>"> Banner Title<br/>
    <?php echo aq_field_input('title', $block_id, $title) ?> </label>
</p>
<p class="description half">
  <label for="<?php echo $this->get_field_id('img') ?>"> Upload an image<br/>
    <?php echo aq_field_upload('img', $block_id, $img) ?> </label>
  <?php if($img) { ?>
<div class="screenshot"> <img src="<?php echo $img ?>" /> </div>
<?php } ?>
</p>
<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
				</label>
			</p>
   <p>
				<input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id( 'parallax_background' ); ?>" name="<?php echo $this->get_field_name( 'parallax_background' ); ?>"<?php checked( $instance['parallax_background'], 'true' ); ?> />
				<label for="<?php echo $this->get_field_id( 'parallax_background' ); ?>"><?php _e( 'Parallax Background Effect?', 'sublime' ); ?></label>
			</p>
<?php
		}
		
		function block($instance) {
			extract($instance);
				$featured ='';
			if( isset( $parallax_background ) && $parallax_background == true) {$parallax_background='bgimage parallax';} else {$parallax_background='stretch-bg';};
	

echo '</div></div></div></div></div>';
 echo '<section class="'.$parallax_background.'" data-stellar-background-ratio="0.5">
		<div class="container box">';

echo '';
  echo  '<div class="span5 pow"><img src="'.$img.'"/></div>'; 
   echo '<div class="span6"><h4>'.$title.'</h4>'.wpautop(do_shortcode(htmlspecialchars_decode($text).'</div>'));
			echo '</div></section>';
  echo '<div class="container box"><div class="row"><div class="row">';
			
$content = ob_get_contents();

	return $content;

?>

<?php
			
			
		}
		
	}
}
?>
