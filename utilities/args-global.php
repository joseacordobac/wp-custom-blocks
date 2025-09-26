<?php 

function args_global(
  
  $post_type, 
  $search, 
  $limit = 12, 
  $taxonomies = [], 
  $meta_key, 
  $orderby = 'meta_value', 
  $order, 
  $page = 1) {

    $args = array(
      'post_type'      => $post_type,
      'orderby'        => $orderby,
      'posts_per_page' => $limit,
      'paged'          => $page
    );

    if($meta_key){
      $args['meta_key'] = $meta_key;
    }
    
    if($search){
      $args['s'] = $search;
    }

    if($order){
      $args['meta_key'] = 'precio';
      $args['order'] = $order;
      $args['orderby'] = 'meta_value';
    }

    if($taxonomies) {

      $tax_queries = [];
      foreach ($taxonomies as $key => $value) {
        $array_termss = explode(",", $value);
        $tax_queries[] = [
          'taxonomy' => $key,
          'field' => 'slug',
          'terms' => $array_termss
        ];
      }  
      
      $args['tax_query'] = array(
        'relation' => 'OR',
        ...$tax_queries
      ); 
    }

  return $args;
}

?>