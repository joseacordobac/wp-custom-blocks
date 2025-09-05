<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_cards_list( $attributes, $content, $block) {

	$post_type = $attributes['postType'];
	$search = isset( $_GET['search'] ) ? $_GET['search'] : '';
	$limit = isset( $_GET['per_page'] ) ? $_GET['per_page'] : 12;
	$meta_key = isset( $_GET['meta_key'] ) ? $_GET['meta_key'] : 'precio';
	$orderby = isset( $_GET['orderby'] ) ? $_GET['orderby'] : '';
	$order = isset( $_GET['order'] ) ? $_GET['order'] : 'ASC';
	$page = isset( $_GET['page'] ) ? $_GET['page'] : 1;

	$taxonomies = null;
    $meta_query = null;

	  $args = args_global(
      $post_type,
      $search,
      $limit,
      $taxonomies,
      $meta_key,
      $orderby,
      $order,
      $page
    );

	$html = '';

	$cards_list = new WP_Query($args);
	$total_posts = $cards_list->found_posts;

	while ($cards_list->have_posts()) {
		$cards_list->the_post();
		$total_pages = $cards_list->max_num_pages;

		$tipo_producto = get_the_terms( get_the_ID(), 'tipo-producto' ); //To do: create a dinamic
		$marca = get_the_terms( get_the_ID(), 'marcas' ); //To do: create a dinamic

		$html .= '<div class="card-list-content">';
		
			$html .= '<div class="card-list__img">';
				$html .= (get_field('url_de_la_imagen') ? '<img class="card-list__img-src" src="'.get_field('url_de_la_imagen') .'" alt="">' : '');
			$html .= '</div>';
			$html .= '<div class="card-list__body">';
				$html .= '<span class="card-list__tag-cat">'.$tipo_producto[0]->name.'</span>';
				$html .= '<h3 class="card-list__title">'.get_the_content().'</h3>';
				$html .= '<h4 class="card-list__price">' . get_field('precio');
				$html .= '<span class="card-list__price-description">' . get_field('nota_de_precio') . '</span></h4>';
				$html .= '<p class="card-list__marca">Marca: <b class="card-list__marca-bold">'.$marca[0]->name.'</b></p>';
				$html .= '<a href="https://wa.me/'.get_field('whatsapp-number', 'options').'?text=Estoy interesado en:'. get_the_content() .'" target="_blank" class="card-list__contact-us">Pedir</a>';
			$html .= '</div>';

		$html .= '</div>';
	}

	return '<div id="app" class="card-list" data-pages="' . $total_pages . '">'.$html.'</div>';

}
