<?php
/** Testimonial Block **/
if(!class_exists('PG_Clients_Block')) {
	class PG_Clients_Block extends AQ_Block {
		function __construct() {
			$block_options = array(
				'name'			=> 'Clients',
				'size'			=> 'span12',
					'resizable' => 0
				
			);
			
			parent::__construct('pg_clients_block', $block_options);
			
			add_action('wp_ajax_aq_block_client_add_new', array($this, 'add_client'));
		}
		
		function form($instance) {
			$defaults = array(
				'clients'		=> array(
					1 => array(
						'upload' => ''
					
					)
				)
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>

<div class="description cf">
  <ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
    <?php
					$clients = is_array($clients) ? $clients : $defaults['clients'];
					$count = 1;
					foreach($clients as $client) {	
						$this->client($client, $count);
						$count++;
					}
					?>
  </ul>
  <p></p>
  <a href="#" rel="client" class="aq-sortable-add-new button">Add New</a>
  <p></p>
</div>
<?php
		}
		
		function client($client = array(), $count = 0) {
			
			$defaults = array (
				'upload' =>''
		
			);
			$client = wp_parse_args($client, $defaults);
			
			?>
<li id="<?php echo $this->get_field_id('clients') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
  <div class="sortable-head cf">
    <div class="sortable-title"> <strong>Client</strong> </div>
    <div class="sortable-handle"> <a href="#">Open / Close</a> </div>
  </div>
  <div class="sortable-body">
    <p class="description">
      <label for="<?php echo $this->get_field_id('clients') ?>-<?php echo $count ?>-upload"> Upload Image<br/>
        <input type="text" id="<?php echo $this->get_field_id('clients') ?>-<?php echo $count ?>-upload" class="input-full input-upload" value="<?php echo $client['upload'] ?>" name="<?php echo $this->get_field_name('clients') ?>[<?php echo $count ?>][upload]">
        <a href="#" class="aq_upload_button button" rel="img">Upload</a> </label>
    </p>
    <p class="description"><a href="#" class="sortable-delete">Delete</a></p>
  </div>
</li>
<?php
		}
		
		function add_client() {
			$nonce = $_POST['security'];	
			if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
			
			$count = isset($_POST['count']) ? absint($_POST['count']) : false;
			$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
			
			//default key/value for the tab
			$client = array(
				
			);
			
			if($count) {
				$this->client($client, $count);
			} else {
				die(-1);
			}
			
			die();
		}
		
		function block($instance) {
		
			
			extract($instance);
				echo '</div></div></div>';

echo '<div class="client-banner stretch bgimage">
  <div class="container"><div class="row-fluid">';
			$count = count($clients);
			$i = 1;
			
		
		
				
		
			?>
<?php foreach ($clients as $client) {	
					
					
						?>
<div class="span2"><img src="<?php echo $client['upload'] ?>"/></div>
<?php
						
						}
					
					
						?>
<?php  echo '</div></div></div><div class="container box">
<div class="row"><div class="row">';
				
			?>
<?php
			
		}
		
		function update($new_instance, $old_instance) {
			return $new_instance;
		}
		
	}
	}
