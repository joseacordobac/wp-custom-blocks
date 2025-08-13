<?php

include_once 'render.php';

function create_block_taxfilter() {
	register_block_type(
		BUILD_PATH . '/taxfilter',
		array(
			'render_callback' => 'render_taxfilter'
		)
	);
}

add_action( 'init', 'create_block_taxfilter' );



