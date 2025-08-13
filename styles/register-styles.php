<?php 

 function global_plugin_enqueue_styles() {

    wp_enqueue_style( 'globals', plugins_url( 'globals.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'global_plugin_enqueue_styles' );