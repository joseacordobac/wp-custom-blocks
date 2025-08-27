<?php

include_once 'render.php';

function create_block_totalfilter() {
	register_block_type(
		BUILD_PATH . '/totals',
		array(
			'render_callback' => 'render_total_filter'
		)
	);
}

add_action( 'init', 'create_block_totalfilter' );



