<?php

	function shortcode_sales($atts, $content=null, $code) {
	
	extract(shortcode_atts(array(
		'amount' => '',
			'text'  => '',
	), $atts));
	ob_start();
	

	
		
		echo '<div class="envato-sales"> <div class="salesnum">'.$amount.'</div> <h4>'.$text.'</h4> </div>';
	

			
$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
add_shortcode( 'sales', 'shortcode_sales' );

?>
