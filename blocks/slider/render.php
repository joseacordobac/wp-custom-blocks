<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_slider_block($block_attributes, $content) {
	
	$slider_options = $block_attributes['slideConfig'];
	$slider_icons = $block_attributes['arrowIcon'];
	$slider_id = isset($block_attributes['sliderId']) ? 'slider-'.$block_attributes['sliderId'] : 'slider-' . uniqid();

	$jsonSlideConfig = json_encode($slider_options);

	$slider_pagination = false;
	$slider_arrows = isset($slider_options['arrows']) ? $slider_options['arrows'] : false;
	

	wp_enqueue_style( 'slider-swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css',array(),'1.1','all');
	wp_enqueue_script( 'slider-swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '1.1', true);

	$html = '<div class="element-slider-contains alignfull">';
		$html .= '<div class="swiper-container slider-block" id="' . $slider_id. '" data-swiper="' . esc_attr($jsonSlideConfig) . '">';

			$html .= '<div class="swiper-wrapper content-slider">';
				$html .= $content;
			$html .= '</div>';
				
			$html .= $slider_pagination ? '<div class="swiper-pagination"></div>' : '';

		$html .= '</div>';
		if($slider_arrows){
			$html .= '<div class="arrow-btn arrow-btn-right next-'.$slider_id .'"><img src="' . $slider_icons['next'] .'" alt="arrow-right"></img></div>';
			$html .= '<div class="arrow-btn arrow-btn-left prev-'.$slider_id .'"><img src="' . $slider_icons['prev'] .'" alt="arrow-left"></img></div>';
		}
	$html .= '</div>';

	return $html;

}
