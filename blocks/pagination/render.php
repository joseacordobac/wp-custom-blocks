<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_pagination( $attributes, $content, $block) {
	$align = isset( $attributes['align'] ) ? $attributes['align'] : 'left';
	$className = isset( $attributes['className'] ) ? $attributes['className'] : '';

	$html = '<div id="pagination-block-root" class="content-pagination '. $align . ' '. $className . '"></div>';

	return $html;

}
