<?php
/**
 * @link       https://example.com
 * @since      1.0.0
 * @package    HB_PopUp
 * @author     Jessica Michaels <jessicacmichaels@gmail.com>
 */

/**
 * The core plugin class.
 * @since      1.0.0
 * @package    HB_PopUp
 * @subpackage HB_PopUp/includes
 * @author     Jessica Michaels <jessicacmichaels@gmail.com>
 */
class HB_PopUp
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Define the core functionality of the plugin.
     *
     * @since    1.0.0
     */

    public function __construct()
    {
        if (defined('HB_POPUP_VERSION')) {
            $this->version = HB_POPUP_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'hb-popup';

    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @return    string    The version number of the plugin.
     * @since     1.0.0
     */
    public function get_version()
    {
        return $this->version;
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return    string    The name of the plugin.
     * @since     1.0.0
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__DIR__) . '/public/css/public.min.css', array(), false, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__DIR__) . 'public/js/public.min.js', array('jquery'), $this->version, false);

    }

    /**
     * Get the public-facing markup
     *
     * @since   1.0.0
     */

    public function get_markup()
    {
        include(plugin_dir_path(__DIR__) . 'public/partials/hb-popup-public.php');
    }

    /**
     * Load markup only if the page loaded is the default post type
     *
     * @since   1.0.0
     */

    public function load_hb_popup()
    {
        if (get_post_type() === 'post') {
            $this->get_markup();
        }
    }

}