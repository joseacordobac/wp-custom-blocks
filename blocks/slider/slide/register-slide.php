<?php

include_once 'render.php';

function create_block_slide() {
	register_block_type(
		BUILD_PATH . '/slider/slide',
		array(
			'render_callback' => 'render_slide_block'
		)
	);
}

add_action( 'init', 'create_block_slide' );

?>
