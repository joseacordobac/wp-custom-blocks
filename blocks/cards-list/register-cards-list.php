<?php

include_once 'render.php';

function create_block_cards_list() {
	register_block_type(
		BUILD_PATH . '/cards-list',
		array(
			'render_callback' => 'render_cards_list'
		)
	);
}

add_action( 'init', 'create_block_cards_list' );



