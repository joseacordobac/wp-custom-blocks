<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_total_filter( $attributes, $content, $block) {

		$html = '<div class="card-list-head">';
			$html .= '<h3 class="card-list-head__total">XX productos en tu busqueda</h3>';
			$html .= '<div class="card-list-head__sort">';
				$html .= '<h4 class="card-list-head__sort-title">Ordenar por: ';
				$html .= '<span class="card-list-head__sort-order">Precio de menor a mayor</span>';
				$html .= '</h4>';
			$html .= '</div>';
		$html .= '</div>';

		return $html;

}
