<?php 

function args_query_posts($post_type, $search, $tax_level, $limit = 12) {

  $args = array(
    'post_type' => $post_type,
    's' => $search,
    'posts_per_page' => $limit,
    'tax_query' => array(
      array(
        'taxonomy' => 'niveles',
        'field' => 'slug',
        'terms' => $tax_level,
      ),
    ),
  );

  return $args;
}

?>