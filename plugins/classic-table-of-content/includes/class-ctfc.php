<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://https://abhishektewari.com/
 * @since      1.0.0
 *
 * @package    Ctfc
 * @subpackage Ctfc/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Ctfc
 * @subpackage Ctfc/includes
 * @author     Abhishek Tiwari <tiwariabhishek687@gmail.com>
 */
class Ctfc {
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'CTFC_VERSION' ) ) {
			$this->version = CTFC_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'ctfc';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-ctfc-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-ctfc-public.php';

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$ctfc_admin = new Ctfc_Admin( $this->get_plugin_name(), $this->get_version() );

		add_action( 'admin_enqueue_scripts', [ $ctfc_admin, 'enqueue_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $ctfc_admin, 'enqueue_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $ctfc_admin, 'enqueue_scripts' ] );
		add_action( 'admin_menu', [ $ctfc_admin, 'ctfc_admin_menu' ],99);
		add_action('admin_init', [ $ctfc_admin, 'ctfc_admin_settings_init' ] );

	}

	/**
	 * Register all of the hooks related to the public area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$ctfc_public = new Ctfc_Public( $this->get_plugin_name(), $this->get_version() );
		add_action( 'wp_enqueue_scripts', [ $ctfc_public, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $ctfc_public, 'enqueue_scripts' ] );
		add_action( 'the_content', [ $ctfc_public, 'add_content_before_post_content' ] );
        add_shortcode('classic_table_of_content', [ $ctfc_public, 'classic_table_of_content_callback' ]);
		add_filter( 'at_single_page_tags_array', [ $ctfc_public, 'at_single_page_tags_array_callback' ], 10 );

	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
