<?php

class RepositoryList
{

  public function get_all_post_data($param) {
    $params = $param->get_json_params();
    $tax_queries = null;
    $meta_query = null;

    $args = args_global(
      $params['post_type'],
      $params['search'],
      $params['limit'],
      $params['taxonomies'],
      $params['meta_key'],
      $params['orderby'],
      $params['order'],
      $params['page']
    );
     
    $get_all_post = new WP_Query($args);
    $data['data'] = [];

    while ($get_all_post->have_posts()) {
      $get_all_post->the_post();
      $data['data'][] = array(
        'id' => get_the_ID(),
        'title' => get_the_title(),
        'slug' => get_post_field('post_name'),
        'description' => get_the_content(),
        'thumbnail' => get_field('url_de_la_imagen'),
        'url' => get_the_permalink(),
        'price' => get_field('precio'),
        'nota_price' => get_field('nota_de_precio'),
        'tipo_producto' => get_the_terms( get_the_ID(), 'tipo-producto' ),
        'marca' => get_the_terms( get_the_ID(), 'marcas' ),
        'whatsapp' => get_field('whatsapp-number', 'options')
      );
    }

    $data['count'] = $get_all_post->found_posts;
    $data['page'] = [
      'current_page' => isset($params['page']) ? $params['page'] : 1, 
      'total_pages' => $get_all_post->max_num_pages,
    ];

    return $data;
  }


  private function new_excerpt($excerpt){
    $excerpt = wp_strip_all_tags($excerpt);
    if(strlen($excerpt) > 80){
      $excerpt = substr($excerpt, 0, 80) . '...';
    }
    return $excerpt;
  }


}
