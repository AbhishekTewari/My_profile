<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://abhishektewari.com/
 * @since      1.0.0
 *
 * @package    Ctfc
 * @subpackage Ctfc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ctfc
 * @subpackage Ctfc/admin
 * @author     Abhishek Tiwari <tiwariabhishek687@gmail.com>
 */
class Ctfc_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, CTOC_PLUGIN_DIR. '/assets/admin/css/ctfc-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, CTOC_PLUGIN_DIR. '/assets/admin/js/ctfc-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * callback function for custom menu in wordpress menu bar.
	 *
	 * @since    1.0.0
	 */
	public function ctfc_page_callback_1() {
		// Remove all admin notices
		add_action('in_admin_header', function () {
			remove_all_actions('admin_notices');
			remove_all_actions('all_admin_notices');
		});
        $html = "";
		$html .= include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/class-ctfc-admin-dashboard.php';
        return $html;
	}

	/**
	 * Register admin main menu.
	 *
	 * @since    1.0.0
	 */
	public function ctfc_admin_menu() {
		add_menu_page(
			'CTFC Option Page',  // Page title
			'CTFC',        // Menu title
			'manage_options',     // Capability
			'ctfc-page',   // Menu slug
			[ $this, 'ctfc_page_callback_1' ], // Function to display page content
			'dashicons-admin-generic', // Icon (Dashicons)
			25 // Menu position
		);
	}

	/**
	 * Register admin setting.
	 *
	 * @since    1.0.0
	 */
	public function ctfc_admin_settings_init(){
		// Register a setting for storing the option
		register_setting('ctfc_admin_settings_group', 'ctfc_admin_option');
	}
}
