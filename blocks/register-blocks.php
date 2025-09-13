<?php 

 define('BUILD_PATH', __DIR__ . '/builds' );

include_once 'search/register-search.php';
include_once 'taxfilter/register-taxfilter.php';
include_once 'slider/register-slider.php';
include_once 'slider/slide/register-slide.php';

function my_custom_blocks_init() {
    register_block_type( BUILD_PATH . '/totals');
    register_block_type( BUILD_PATH . '/pagination' );
    register_block_type(BUILD_PATH . '/cards-list');
}
add_action( 'init', 'my_custom_blocks_init' );
