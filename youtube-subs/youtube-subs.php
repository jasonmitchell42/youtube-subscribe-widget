<?php
/*
Plugin Name: YouTube Subs
Plugin URI: https://jasonmitchell.website
Description: Display YouTube sub button and count
Version: 1.0.0
Author: Jason Mitchell
Author URI:  https://jasonmitchell.website
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// load scripts
require_once(plugin_dir_path(__FILE__) . "/inc/youtube-subs-scripts.php");
// load class
require_once(plugin_dir_path(__FILE__) . "/inc/youtube-subs-class.php");

// register widget
function register_youtubesubs() {
    register_widget('YouTube_Subs');
}
add_action('widgets_init', 'register_youtubesubs');