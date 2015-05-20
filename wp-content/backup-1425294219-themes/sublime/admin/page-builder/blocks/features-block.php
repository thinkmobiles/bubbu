<?php

if(!class_exists('PG_Features_Block')) {
	class PG_Features_Block extends AQ_Block {
		
		function __construct() {
			$block_options = array(
				'name' => 'Features',
				'size' => 'span4'
			);
			
			parent::__construct('pg_features_block', $block_options);
		}
		
		function form($instance) {
			$defaults = array(
				'title' => '',
				'icon' => '',
				'text' => '',
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('icon') ?>">
					Icon Class - <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">refer here</a><br/>
					<?php echo aq_field_input('icon', $block_id, $icon) ?>
				</label>
			</p>
			<p class="description">
				<label for="<?php echo $this->get_field_id('text') ?>">
					Feature text
					<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full') ?>
				</label>
			</p>
			<?php
			
		}
		
		function block($instance) {
			extract($instance);
			
			
			
			if($icon) echo  '<div class="featurebox"><span class="featurebox-icon"><span class="icon fa '.$icon.'"></span></span>';
			$stringf = sprintf( __('%s', 'sublime'), $title );
			if($title) echo '<div class="featurebox-content"><h4 class="featurebox-content-title">'.strip_tags($stringf). '</h4>';
			$stringf2 = sprintf( __('%s', 'sublime'), $text );
			echo wpautop(do_shortcode(htmlspecialchars_decode($stringf2).'</div></div>'));
			
		}
		
	}
}

