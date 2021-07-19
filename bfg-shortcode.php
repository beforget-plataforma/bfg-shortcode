<?php
/*
Plugin Name: BFG ShortCode
Plugin URI:
Description: Shortcode
Version:     1.2
Author:      Beforget
Author URI:  https://beforget.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit;
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-member.php';
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-post.php';
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-events.php';
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-sesiones.php';
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-project.php';
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-style-register.php';
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-video-sesion.php';
require_once plugin_dir_path(__FILE__) . 'includes/bfg-short-code-registro-evento.php';
register_activation_hook(__FILE__, 'rewrite_flush');