<?php

/**
 * The plugin bootstrap file
 *
 * @link              bsquadt.com
 * @since             1.0.0
 * @package           Saturn_Woo_Edit
 *
 * @wordpress-plugin
 * Plugin Name:       Saturn WooCommerce Booking
 * Plugin URI:        bsquadt.com
 * Description:       Basic plugin used to disable some checkout fields and to add a date picker to woocommerce. 
 * Version:           v1.3.0
 * Author:            Vincent Roper
 * Author URI:        bsquadt.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       saturn-woo-edit
 * Domain Path:       /languages
 * WC requires at least: 3.0.0
 * WC tested up to: 3.1.1
 */

	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

require plugin_dir_path( __FILE__ ).'updater/saturn-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://bitbucket.org/bsquadt/saturnbook',
	__FILE__,
	'saturn-woo-edit'
);


$myUpdateChecker->setAuthentication(array(
	'consumer_key' => 'gM5eJtc5ZWU8GZ9A4r',
	'consumer_secret' => '8CTDHdmFteewyxCdCCbrSXWrwGqQexy6',
));


$myUpdateChecker->setBranch('master');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-saturn-woo-edit-activator.php
 */
function activate_saturn_woo_edit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-saturn-woo-edit-activator.php';
	Saturn_Woo_Edit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-saturn-woo-edit-deactivator.php
 */
function deactivate_saturn_woo_edit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-saturn-woo-edit-deactivator.php';
	Saturn_Woo_Edit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_saturn_woo_edit' );
register_deactivation_hook( __FILE__, 'deactivate_saturn_woo_edit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-saturn-woo-edit.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_saturn_woo_edit() {

	$plugin = new Saturn_Woo_Edit();
	$plugin->run();

}
run_saturn_woo_edit();
