<?php

include_once 'render.php';

function create_block_pagination() {
	register_block_type(
		BUILD_PATH . '/pagination',
		array(
			'render_callback' => 'render_pagination'
		)
	);
}

add_action( 'init', 'create_block_pagination' );



