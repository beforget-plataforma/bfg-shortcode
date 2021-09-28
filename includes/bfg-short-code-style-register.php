<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function bfg_register_plugin_styles_shortcode() {
	wp_register_style( 'bfg-style-shortcode', plugins_url( '/bfg-shortcode/assets/css/bfg-style-shortcode.css', true ) );
	wp_enqueue_style( 'bfg-style-shortcode' );
}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'bfg_register_plugin_styles_shortcode' );