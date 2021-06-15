<?php
/*
Plugin Name: Latest posts with vue.js
Description: Latest posts shortcode
Version: 1.0
*/

// Register scripts
function func_load_vuescripts() {
    wp_register_script( 'wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
    wp_register_script('latest_posts', plugin_dir_url( __FILE__ ).'latestposts.js', 'wpvue_vuejs', true );
}
add_action('wp_enqueue_scripts', 'func_load_vuescripts');

// Add shortcode
function handle_shortcode() {
    // Add vue
    wp_enqueue_script('wpvue_vuejs');
    // Add custom code
    wp_enqueue_script('latest_posts');

    $str = "<div id='mount'></div>";

    return $str;
}
add_shortcode('latestPosts', 'handle_shortcode');