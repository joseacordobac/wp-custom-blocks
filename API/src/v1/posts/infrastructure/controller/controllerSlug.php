<?php

class ControllerList
{

  public function apiList($param) {
    $method = $param->get_method();
    
    if( $method === 'POST' ) {
      return $this->postList($param);
    }
  }

  public function postList($param) {
    $post_list = new RepositoryList();
    $info = $post_list->get_all_post_data($param);

    return rest_ensure_response( $info, 200 );
  }

}
