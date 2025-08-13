<?php

class RepositoryPosts
{

  public function get_page_data_by_slug($param) {

    $post_type = isset($param['post_type']) ? $param['post_type'] : 'post';
    $search = isset($param['search']) && $param['search'] != 'null' ? $param['search'] : null;
    $tax_level = isset($param['level']) ? $param['level'] : null;
    $limit = isset($param['limit']) ? $param['limit'] : 8;
    $tax_usos = isset($param['usos']) ? $param['usos'] : null;
    $slug_query = isset($param['slug']) ? $param['slug'] : null;

    $args = args_query_posts($post_type, $search, $tax_level, $limit, $tax_usos, $slug_query); 
    $loop = new WP_Query($args);

    $all_post = array();

    if ($loop->have_posts()) {
      while ($loop->have_posts()) {
        $loop->the_post();

				global $post;

        $post = array(
          'id'            => get_the_ID(),
          'slug'          => get_post_field('post_name'),
          'date'          => get_the_date(),
          'title'         => get_the_title(),
          'excerpt'       => $this->new_excerpt(get_the_excerpt()),
          'content'       => get_the_content(),
          'featured_image' => get_the_post_thumbnail_url(),
          'url_video'     => get_post_meta(get_the_ID(), 'ur_video', true),
          'duration_min'  => get_post_meta(get_the_ID(), 'duration_min', true),
          'duration_sec'  => get_post_meta(get_the_ID(), 'duration_sec', true),
          'author'        => get_the_author(),
          'level'          => get_the_terms(get_the_ID(), 'levels')[0]->slug,
          'usos'          => get_the_terms(get_the_ID(), 'usos')[0]->slug,
        );

        $all_post[] = $post;
      }
      wp_reset_postdata();
    }

    return $all_post;
  }


  private function new_excerpt($excerpt){
    $excerpt = wp_strip_all_tags($excerpt);
    if(strlen($excerpt) > 80){
      $excerpt = substr($excerpt, 0, 80) . '...';
    }
    return $excerpt;
  }


}
