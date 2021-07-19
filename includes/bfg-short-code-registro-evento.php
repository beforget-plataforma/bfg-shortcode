<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function bfg_get_template_part_registro_evento() {
	?>
		<?php
		?>
			<a class="tribe-events-button" href="<?php the_field('link_zoom_mail'); ?>" target="_blank" rel="noopener">Acceder al evento</a>
		<?
		return;
		?>
	<?
}

function bfg_registro_evento_shortcode($atts){
	$templateLayout = 'template-parts/content-dashboard-video';
	$output = '';
	$output .= '<div>';
		ob_start();
		bfg_get_template_part_registro_evento();
		$output .= ob_get_clean();
	$output .= '</div>';
	wp_reset_postdata();
	return $output;
}

add_shortcode('registro-evento-shortcode', 'bfg_registro_evento_shortcode');
