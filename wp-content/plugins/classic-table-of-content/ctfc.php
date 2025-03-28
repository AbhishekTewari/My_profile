<?php
/**
 * Classic Table of Contents
 *
 * @package       ctfc
 * @since         1.0.0
 * @author        Abhishek Tiwari
 *
 * @wordpress-plugin
 * Plugin Name:       Classic Table of Contents
 * Plugin URI:        https://abhishektewari.com/
 * Description:       This Plugin provide a classic and easy to use Table of content in your post which also helps in SEO. 
 * Version:           1.0.0
 * Author:            Abhishek Tiwari
 * Author URI:        https://abhishektewari.com/
 * Text Domain:       ctfc
 * Domain Path:       /languages
 * Requires PHP:      7.4
 * Requires at least: 6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Currently plugin version 1.0.0.
 */
define( 'CTFC_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ctfc-activator.php
 */
function activate_ctfc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ctfc-activator.php';
	Ctfc_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ctfc-deactivator.php
 */
function deactivate_ctfc() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ctfc-deactivator.php';
	Ctfc_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ctfc' );
register_deactivation_hook( __FILE__, 'deactivate_ctfc' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ctfc.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ctfc() {
	$plugin = new Ctfc();
}
run_ctfc();


//defining all constant
define( 'CTOC_PLUGIN_DIR', plugin_dir_url( __FILE__ ));

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);