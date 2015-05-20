<?php

if(!class_exists('PG_Contact_Block')) {
	class PG_Contact_Block extends AQ_Block {
	
		function __construct() {
			$block_options = array (
				'name' => 'Contact Form',
				'size' => 'span6',
			);
			
			parent::__construct('pg_contact_block', $block_options);
		}
		
		function form($instance) {
			$defaults = array (
				'form_id' => 0,
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			if(!is_plugin_active( 'contact-form-7/wp-contact-form-7.php')) {
				echo __('Sorry, this block requires the <a href="http://wordpress.org/extend/plugins/contact-form-7/">Contact Form 7</a> plugin to be installed & activated.', 'sublime');
				return false;
			}
			
			$post_type = 'wpcf7_contact_form';
			
			$args = array (
				'post_type' => $post_type,
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
			);
			
			$contact_forms = get_posts($args);
			
			if(empty($contact_forms)) {
				echo __('You do not currently have any contact form setup. Please create a contact form before setting up this block','sublime');
				echo '<br/>';
				echo '<a href="'.admin_url().'?page=wpcf7" title="Setup contact form">'. __('Setup contact form', 'sublime') .'</a>';
				return false;
			}
			
			$form_ids = array();
			foreach( $contact_forms as $form) {
				$form_ids[$form->ID] = strip_tags($form->post_title);
			}
			?>
			<p class="description">
				<label for="<?php echo $this->get_field_id('title') ?>">
					Title (optional)<br/>
					<?php echo aq_field_input('title', $block_id, $title) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('form_id') ?>">
					Choose contact form<br/>
					<?php echo aq_field_select('form_id', $block_id, $form_ids, $form_id); ?>
				</label>
			</p>
			<?php
		}
		
		function block($instance) {
			extract($instance);
			$stringc = sprintf( __('%s', 'sublime'), $title );
			if($title) echo '<h4 class="aq-block-title">'.strip_tags($stringc).'</h4>';
			echo do_shortcode('[contact-form-7 id="'.$form_id.'" title="'.$stringc.'"]');
		}
	}
}


