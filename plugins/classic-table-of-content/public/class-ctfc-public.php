<?php

/**
 * The public-specific functionality of the plugin.
 *
 * @link       https://https://abhishektewari.com/
 * @since      1.0.0
 *
 * @package    Ctfc
 * @subpackage Ctfc/public
 */

/**
 * The public-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    Ctfc
 * @subpackage Ctfc/public
 * @author     Abhishek Tiwari <tiwariabhishek687@gmail.com>
 */
class Ctfc_Public {

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
	 * Register the stylesheets for the public area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, CTOC_PLUGIN_DIR. '/assets/public/css/ctfc-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, CTOC_PLUGIN_DIR. '/assets/public/js/ctfc-public.js', array( 'jquery' ), $this->version, true );

	}

    function add_content_before_post_content($content) {
        // Check if we're on a single post page and in the main query
        if (is_single() && in_the_loop() && is_main_query()) {
            // Add the custom content using a shortcode
            $custom_content = do_shortcode('[classic_table_of_content]');
            
            // Combine the custom content with the original content
            $content = $custom_content . $content;
		}
        return $content;
    }

    public function classic_table_of_content_callback(){
        ob_start();
        $html = "";
        include_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/class-table-of-content-shortcode.php';
        $html = ob_get_clean();
        return $html;
    }
}