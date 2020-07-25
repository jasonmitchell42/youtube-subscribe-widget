<?php
// add scripts

function yts_add_scripts()
{
    // Add main css
    wp_enqueue_style('yts-main-style', plugins_url() . '/youtube-subs/css/style.css', "", "1.0.0" ,"all");

    // Add main js
    wp_deregister_script('jquery');

    wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", "", "3.5.1", true);
    wp_enqueue_script('jquery');
    wp_register_script('youtube-platform', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('youtube-platform');
    wp_enqueue_script('yts-main-script', plugins_url() . '/youtube-subs/js/main.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'yts_add_scripts');