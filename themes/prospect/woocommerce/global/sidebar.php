<?php
/**
 * Sidebar
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version	 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly
}
	$woo_sidebar = prospect_get_option( 'woo_sidebar' );
	dynamic_sidebar( $woo_sidebar );
?>
