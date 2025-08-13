<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_slider_block($block_attributes, $content) {

	$slider_id = isset($block_attributes['sliderId']) ? $block_attributes['sliderId'] : 'slider-' . uniqid();
	$jsonSlideConfig = json_encode($block_attributes['slideConfig']);

	wp_enqueue_style(
		'slider-swiper',
		'https://unpkg.com/swiper/swiper-bundle.min.css',
		array(),
		'1.1',
		'all'
	);

	wp_enqueue_script(
		'slider-swiper',
		'https://unpkg.com/swiper/swiper-bundle.min.js',
		array(),
		'1.1',
		true
	);

	wp_enqueue_script(
		'slider-js',
		plugin_dir_url(__FILE__) . 'slider.js',
		array('slider-swiper'),
		'1.1',
		true
	);

	wp_enqueue_style(
		'slider-css',
		plugin_dir_url(__FILE__) . 'slider.css',
		array(),
		'1.1',
		'all'
	);


	$html = '<div class="swiper-container slider-block" id="' . $slider_id. '" data-swiper="' . esc_attr($jsonSlideConfig) . '">';
		$html .= '<div class="swiper-wrapper">';
			$html .= $content;
		$html .= '</div>';
		$html .= '<div class="swiper-pagination"></div>';
		// $html .= '<div class="swiper-button-next"></div>';
		// $html .= '<div class="swiper-button-prev"></div>';
	$html .= '</div>';

	return $html;

}
