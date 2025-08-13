<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_search( $attributes, $content, $block) {

	$placeholder = $attributes['placeholder'] ?? 'Search';
	$buttonText = $attributes['buttonText'] ?? 'Buscar';
	$searchPage = $attributes['searchPage'] ? 'new-direct' : 'direct';
	$className = $attributes['className'] ?? '';
	$icon = $attributes['icon'] ?? '';


	return '<div class="block-my-search ' . $className . '" data-search="' . $searchPage . '">
			<span class="block-my-search__icon">' . $icon . '</span>
			<input class="block-my-search__input" type="text" placeholder="' . $placeholder . '" name="main-search"/>
			<button class="block-my-search__button">' . $buttonText . '</button>
		</div>';

}
