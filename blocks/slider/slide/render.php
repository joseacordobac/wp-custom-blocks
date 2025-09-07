<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_slide_block($block_attributes, $content) {

	$html = '<div class="swiper-slide swiper-slide--block">';
		$html .= $content;
	$html .= '</div>';
	return $html;

}
