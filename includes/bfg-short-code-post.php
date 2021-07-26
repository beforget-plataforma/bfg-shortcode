<?php
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Filtramos los post que mostramos en Talks por cada usuario
 */
function bfg_post_shortcode($atts)
{
	$category = $atts['category'];
	$layout = $atts['layout'];
	$title = $atts['title'];
	$user_id = bp_displayed_user_id();
	$authorId = get_the_author_meta( 'ID' );
	$profileUserID = bp_displayed_user_id();
	$current_user = wp_get_current_user();
	$classSlide = '';

	$argsGetMembers = array(
		'type' => "active",
	);

	$members = bp_core_get_users($argsGetMembers);
	
	// var_dump($members);

	$layoutLibrery = ["list", "block", "slide"];
	$templateLayout = "";
	
	if($layout === 'list') {
		$templateLayout = 'template-parts/content-dashboard-post';
	} else if($layout === 'slide'){
		$templateLayout = 'template-parts/content-dashboard-post';
		$classSlide = 'flex bfg-flex-grap bfg-slide-post';
	}

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'hide_empty' => false,
		'order' => 'DESC',
	);
	$the_query = new WP_Query($args);
	$output = '';

	if ($the_query->have_posts()) {
		$output .= '<div class="bfg-shortcode-container bb-block-header dash-bfg-slide">';
		$output .= '<div class="bfg-shortcode-lading-slider active"></div>';
		$output .= '<div class="wrapper-post-profile '.$classSlide.'">';
		while ( $the_query->have_posts() ) : $the_query->the_post();
				 ob_start();
				 get_template_part( $templateLayout );
				 $output .= ob_get_clean();
		endwhile;
		wp_reset_postdata();
		if( $show_archive == 'true' ) {
				 $output .= '<div class="full-width align-right">';
				 $output .= '<a class="button-small inverse" href="' . get_home_url() . '/news">See All Archives</a>';
				 $output .= '</div>';
		}
		$output .= '</div>';
		$output .= '</div>';
	} 
	do_action('bfg_post_slick_script');
	return $output;
}

add_shortcode('post-shortcode', 'bfg_post_shortcode');

function bfg_post_script_slick() {
  wp_register_script('bfgPostSlick', esc_url(plugins_url('/frontend/dist/loadSlickCarrusel.js', dirname(__FILE__) )), true);
  wp_localize_script('bfgPostSlick', 'wp_pageviews_ajax', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce( 'wp-pageviews-nonce' ),
  ));

  wp_enqueue_script('bfgPostSlick');

  // wp_register_style( 'bfg-style-post', plugins_url( '/bfg-project-content/assets/css/bfg-style.css' ) );
	// wp_enqueue_style( 'bfg-style-post' );

}

add_action( 'bfg_post_slick_script', 'bfg_post_script_slick' );