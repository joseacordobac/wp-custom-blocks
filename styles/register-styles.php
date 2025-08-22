<?php 

 function global_plugin_enqueue_styles() {

    wp_enqueue_style( 'globals', plugins_url( 'globals.css', __FILE__ ) );
    wp_enqueue_script('globals', plugins_url('globals.js', __FILE__), array('jquery'), null, true);
    
}
add_action( 'wp_enqueue_scripts', 'global_plugin_enqueue_styles' );