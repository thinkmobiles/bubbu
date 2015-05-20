<?php

if(!class_exists('PG_Banner_Block')) {
	class PG_Banner_Block extends AQ_Block {
		
	
		function __construct() {
			
			$block_options = array(
				'name' => 'Banner',
				'size' => 'span12',
				'banner_button' =>'',
				'button_text' =>'',
				'button_url' =>''
			);
			

			parent::__construct('pg_banner_block', $block_options);
			
		}
		
		function form($instance) {
			
			$defaults = array(
				'text' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)
					<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo _e($title,'sublime') ?>" name="<?php echo $this->get_field_name('title') ?>">
				</label>
			</p>
			
			<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					Content
					<textarea id="<?php echo $this->get_field_id('text') ?>" class="textarea-full" name="<?php echo $this->get_field_name('text') ?>" rows="5"><?php echo $text ?></textarea>
				</label>
			</p>
      <p>
				<input class="checkbox" type="checkbox" value="true" id="<?php echo $this->get_field_id( 'banner_button' ); ?>" name="<?php echo $this->get_field_name( 'banner_button' ); ?>"<?php checked( $instance['banner_button'], 'true' ); ?> />
				<label for="<?php echo $this->get_field_id( 'banner_button' ); ?>"><?php _e( 'Display Button', 'sublime' ); ?></label>
			</p>
      <p class="description">
				<label for="<?php echo $this->get_field_id('button_text') ?>">
					Button Text
					<input id="<?php echo $this->get_field_id('button_text') ?>" class="input-full" type="text" value="<?php echo _e($button_text, 'sublime') ?>" name="<?php echo $this->get_field_name('button_text') ?>">
				</label>
			</p>
      <p class="description half">
				<label for="<?php echo $this->get_field_id('button_url') ?>">
					Button Link<br/>
					<?php echo aq_field_input('button_url', $block_id, $button_url) ?>
				</label>
			</p>
			<?php
		}
		
	function block($instance) {
			extract($instance);
			
			$stringb = sprintf( __('%s', 'sublime'), $button_text );
			$stringb2 = sprintf( __('%s', 'sublime'), $title );
			 echo  '<div class="stretch-banner">';
 if( isset( $banner_button ) && $banner_button == true) { echo '<div class="pull-right"><a href="'.$button_url.'"><button class="btn btn-large">'.$stringb.'</button></a></div>'; }
    echo '<div><h3>'.$stringb2.'</h3>';
			
			
			
			echo '<blockquote>'.wpautop(do_shortcode(htmlspecialchars_decode(_e($text,'sublime')).'</blockquote></div></div>
'));
			
		}
		
	}
}