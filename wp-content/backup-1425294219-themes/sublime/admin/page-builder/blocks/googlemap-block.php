<?php
/** Googlemap block **/

if(!class_exists('PG_Googlemap_Block')) {
	class PG_Googlemap_Block extends AQ_Block {
		
		//set and create block
		function __construct() {
			$block_options = array(
				'name' => 'Google Map',
				'size' => 'span6',
			);
			
			//create the block
			parent::__construct('pg_googlemap_block', $block_options);
		}
		
		function form($instance) {
			
			$defaults = array(
				'maptitle' => '',
				'lat' => '',
				'long' => '',
				'pop_title' => '',
				'pop_text' => '',
				
				'zoom' => 8,
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?>
			
			<p class="description half">
				<label for="<?php echo $this->get_field_id('maptitle') ?>">
					Title (optional)<br/>
					<?php echo aq_field_input('maptitle', $block_id, $maptitle) ?>
				</label>
			</p>
			<p class="description half last">
				<label for="<?php echo $this->get_field_id('lat') ?>">
					Latitude (required)<br/>
					<?php echo aq_field_input('lat', $block_id, $lat) ?>
				</label>
			</p>
			<p class="description half">
				<label for="<?php echo $this->get_field_id('long') ?>">
					Longitude (required)<br/>
					<?php echo aq_field_input('long', $block_id, $long) ?>
				</label>
			</p>
			<p class="description fourth">
				<label for="<?php echo $this->get_field_id('zoom') ?>">
					Zoom Level<br/>
					<?php echo aq_field_input('zoom', $block_id, $zoom) ?>
				</label>
			</p>
      <p class="description fourth">
				<label for="<?php echo $this->get_field_id('pop_title') ?>">
					Pop-Up Title<br/>
					<?php echo aq_field_input('pop_title', $block_id, $pop_title) ?>
				</label>
			</p>
		<p class="description fourth">
				<label for="<?php echo $this->get_field_id('pop_text') ?>">
					Pop-Up Text<br/>
					<?php echo aq_field_input('pop_text', $block_id, $pop_text) ?>
				</label>
			</p>
			
			<?php
			
		}
		
		function block($instance) {
			$defaults = array(
				'maptitle' => '',
				'lat' => 49.25,
				'long' => -123.11,
				'zoom' => 8
			);
			$instance = wp_parse_args($instance, $defaults);
			extract($instance);
			
			?><h4><?php echo $maptitle; ?></h4><?php
			$output = '<div id="map_wrapper">
    <div id="map_canvas" class="mapping"></div>
</div>';
				
			
			echo $output;
		
		?>
	
<script type="text/javascript">
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});
function initialize() {
	
	var map;
    // Set the latitude & longitude for our location (London Eye)
    var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
    var mapOptions = {
        center: myLatlng, // Set our point as the centre location
        zoom: <?php echo $zoom; ?>, // Set the zoom level
        mapTypeId: 'roadmap' // set the default map type
    };
            
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    // Allow our satellite view have a tilted display (This only works for certain locations) 
    map.setTilt(45);

    // Create our info window content   
    var infoWindowContent = '<div class="info_content">' +
        '<h5><?php echo $pop_title; ?></h5>' +
        '<p><?php echo $pop_text; ?></p>' +
    '</div>';

    // Initialise the inforWindow
    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });
                
    // Add a marker to the map based on our coordinates
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
		
        title: '<?php $pop_title; ?>'
    });

    // Display our info window when the marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.open(map, marker);
    });
 }
</script> 
 <?php
}}
} ?>
