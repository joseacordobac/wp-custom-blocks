<?php

include_once 'render.php';

function create_block_slider() {
	register_block_type(
		BUILD_PATH . '/slider',
		array(
			'render_callback' => 'render_slider_block'
		)
	);
}

add_action( 'init', 'create_block_slider' );

?>


