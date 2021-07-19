<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function bfg_get_template_part() {
	$iframe = get_field('video');
	?>
		<div class="embed-container">
					<?php
					echo $iframe;
					return;
					?>
			</div>
	<?
}

function bfg_video_shortcode(){
	$output = '';
	$output .= '<div class="bfg-shortcode-container">';
		ob_start();
		bfg_get_template_part();
		$output .= ob_get_clean();
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
}

add_shortcode('video-shortcode', 'bfg_video_shortcode');