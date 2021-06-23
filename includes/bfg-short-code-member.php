<?php
function bfg_member_shortcode()
{
  $templateLayout = 'template-parts/content-dashboard-member';
	$output = '';
	$output .= '<div class="bfg-shortcode-container container-dash-member">';
		ob_start();
    get_template_part( $templateLayout );
  $output .= ob_get_clean();
	$output .= '</div>';
	return $output;
}

add_shortcode('members-shortcode', 'bfg_member_shortcode');