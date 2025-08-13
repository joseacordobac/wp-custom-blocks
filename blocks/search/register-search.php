<?php

include_once 'render.php';

function create_block_search() {
	register_block_type(
		BUILD_PATH . '/search',
		array(
			'render_callback' => 'render_search'
		)
	);
}

add_action( 'init', 'create_block_search' );



