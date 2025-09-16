<?php 

// Enqueue styles and scripts.
wp_enqueue_style( 'slider-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11', 'all' );
wp_enqueue_script( 'slider-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true );

 define('BUILD_PATH', __DIR__ . '/builds' );

function my_custom_blocks_init() {
    register_block_type( BUILD_PATH . '/totals');
    register_block_type( BUILD_PATH . '/pagination' );
    register_block_type(BUILD_PATH . '/cards-list');
    register_block_type(BUILD_PATH . '/slider');
    register_block_type(BUILD_PATH . '/slider/slide');
    register_block_type(BUILD_PATH . '/search');
    register_block_type(BUILD_PATH . '/taxfilter');
    register_block_type(BUILD_PATH . '/whatsapp');
}
add_action( 'init', 'my_custom_blocks_init' );
