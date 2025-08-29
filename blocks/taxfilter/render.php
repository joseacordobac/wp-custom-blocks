<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_taxfilter( $attributes, $content, $block) {

	$taxonomy_slug = $attributes['taxonomySlug'];
	$type = $attributes['type'];
	$name = $attributes['name'];
	$style = $attributes['style'];

	$terms = get_terms([
    'taxonomy'   => $taxonomy_slug,
    'hide_empty' => false,  
	]);

	$terms_list = '';

	foreach ($terms as $term) {
		$terms_list .= '<div class="block-taxfilter__item">';
			$terms_list .= '<label class="block-taxfilter__label">';
				$terms_list .= '<input class="block-taxfilter__input" type="'.$type.'" value="' . $term->slug . '" name="' . $taxonomy_slug . '" id="' . $term->slug . '">';
				$terms_list .= '<span class="block-taxfilter__text">' . $term->name . '</span>';
			$terms_list .= '</label>';
		$terms_list .= '</div>';
	}

	return '<div class="block-taxfilter block-taxfilter--'.$style.' block-taxfilter--'.$type.'">
			 '.($name ? '<h2 class="block-taxfilter__title">'.$name.'</h2>' : '').'
			 '.$terms_list.'
			</div>';

}
