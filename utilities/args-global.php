<?php 

function args_global($post_type, $search, $limit = 12, $taxonomy = [], $meta_query = [], $meta_key, $orderby, $order, $page = 1) {

  $args = array(
    'post_type' => $post_type,
    's' => $search,
    'posts_per_page' => $limit,
    'meta_key' => $meta_key,
    'orderby' => $orderby,
    'order' => $order,
    'paged' => $page
  );

  if ($taxonomy) {
    $args['tax_query'] = array(
      'relation' => 'OR',
      $taxonomy,
    );
  }

  if ($meta_query) {
    $args['meta_query'] = $meta_query;
  }

  return $args;
}

?>