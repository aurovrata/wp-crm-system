<?php
/*
Plugin Name: WP-CRM System
Plugin URI: https://www.wp-crm.com
Description: A complete CRM for WordPress
Version: 2.1.3
Author: Scott DeLuzio
Author URI: https://www.wp-crm.com
Text Domain: wp-crm-system
*/

/*
 * Copyright 2016  Scott DeLuzio (email : support (at) wp-crm.com)
 * "Fax" Icon made by Freepik [www.freepik.com] from www.flaticon.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Load Text Domain */
add_action('plugins_loaded', 'wp_crm_plugin_init');
function wp_crm_plugin_init() {
	load_plugin_textdomain( 'wp-crm-system', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
}

/*
 * Includes for WP-CRM System
 */
if ( ! defined( 'WP_CRM_SYSTEM' ) ) {
  define( 'WP_CRM_SYSTEM', __FILE__ );
}
if ( ! defined( 'WP_CRM_SYSTEM_VERSION' ) ) {
  define( 'WP_CRM_SYSTEM_VERSION', '2.1.3' );
}
if( ! defined( 'WP_CRM_SYSTEM_URL' ) ) {
	define( 'WP_CRM_SYSTEM_URL', plugins_url( '', __FILE__ ) );
}
if( ! defined( 'WP_CRM_SYSTEM_PLUGIN_DIR' ) ) {
 	define( 'WP_CRM_SYSTEM_PLUGIN_DIR', dirname( __FILE__ ) );
}
if( ! defined( 'WP_CRM_SYSTEM_PLUGIN_URL' ) ) {
	define( 'WP_CRM_SYSTEM_PLUGIN_URL', plugins_url( '', __FILE__ ) );
}
/* Include system variables */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-vars.php' );
/* Include system functions */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-functions.php' );
/* Initial Install Settings Setup */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-initial-install-settings.php' );
/* Menu Links */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-admin-pages.php' );
/* Register Custom Post Types */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-post-types.php' );
/* Setup Dashboard Content */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-dashboard-setup.php' );
/* Run Updates if Needed */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-updates.php' );
/* Display System Setup */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-system-setup.php' );
/* Restrict non-admins from viewing others records */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-restrict-others.php' );
/* Include default fields */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-fields.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-fields-campaign.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-fields-contact.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-fields-opportunity.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-fields-organization.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-fields-project.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-fields-task.php' );
/* Enqueue Scripts and Styles */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-scripts-styles.php' );
/* Include custom meta columns */
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-meta-columns-campaign.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-meta-columns-contact.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-meta-columns-opportunity.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-meta-columns-organization.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-meta-columns-project.php' );
include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-meta-columns-task.php' );
register_activation_hook(__FILE__, 'activate_wpcrm_system_settings');
register_uninstall_hook(__FILE__, 'deactivate_wpcrm_system_settings');

//* Add TinyMCE Editor and Media Upload to WP-CRM System Comments - To Do
/*add_filter( 'wp_editor_settings', 'comment_editor_visual', 10, 2 );
function comment_editor_visual( $settings, $editor_id ){
	include( WP_CRM_SYSTEM_PLUGIN_DIR . '/includes/wcs-vars.php' );
	$screen = get_current_screen();
	if ( in_array( $screen->post_type, $postTypes ) ) {
		$settings['quicktags'] = true;
		$settings['tinymce'] = true;
		$settings['media_buttons'] = true;
		$settings['drag_drop_upload'] = true;
	}
	return $settings;
}*/
