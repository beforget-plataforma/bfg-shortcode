<?php
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Filtramos los post que mostramos en Talks por cada usuario
 */
function bfg_events_shortcode($atts)
{

	$templateLayout = 'template-parts/content-dashboard-events';
	$output = '';
	$output .= '<div class="bfg-shortcode-container">';
		ob_start();
  	get_template_part( $templateLayout );
		$output .= ob_get_clean();
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
}

add_shortcode('events-shortcode', 'bfg_events_shortcode');

// function bfg_events_script_slick() {
//   wp_register_script('bfgPostSlick', esc_url(plugins_url('/frontend/dist/loadSlickCarrusel.js', dirname(__FILE__) )), true);
//   wp_localize_script('bfgPostSlick', 'wp_pageviews_ajax', array(
//     'ajax_url' => admin_url('admin-ajax.php'),
//     'nonce' => wp_create_nonce( 'wp-pageviews-nonce' ),
//   ));

//   wp_enqueue_script('bfgPostSlick');



// }

// add_action( 'bfg_events_slick_script', 'bfg_events_script_slick' );