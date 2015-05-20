<?php

if(!class_exists('PG_Heading_Block')) {
	class PG_Heading_Block extends AQ_Block {
		
	
		function __construct() {
			
			$block_options = array(
				'name' => 'Heading',
				'size' => 'span3',
				
			);
			

			parent::__construct('pg_heading_block', $block_options);
			
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
					<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
				</label>
			</p>
			
			
			<?php
		}
		
	function block($instance) {
			extract($instance);
			
			$stringh = sprintf( __('%s', 'sublime'), $title );
			
			 echo  '

   <h4>'.$stringh.'</h4>';
		
		}
		
	}
}