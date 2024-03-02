<?php
/**
 * Plugin Name: Last Modified Blog Posts
 * Plugin URI: https://github.com/omoh128?tab=repositories
 * Description: Displays an admin notice showcasing the titles of the last modified and published WordPress blog posts.
 * Version: 1.0
 * Author: Omomoh Agiogu
 * Author URI: https://github.com/omoh128?tab=repositories
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: last-modified-blog-posts
 */



// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
// Load plugin text domain for localization.
add_action('plugins_loaded', 'last_modified_blog_posts_load_textdomain');
function last_modified_blog_posts_load_textdomain() {
    load_plugin_textdomain( 'last-modified-blog-posts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

// Include the main plugin class.
require_once plugin_dir_path(__FILE__) . 'includes/class-last-modified-blog-posts.php';

// Instantiate the plugin class.
add_action('plugins_loaded', 'last_modified_blog_posts_init');
function last_modified_blog_posts_init() {
    new Last_Modified_Blog_Posts();
}






