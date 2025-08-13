<?php
  
  class RouterList {

    public function REST_API_LIST() {

      add_action('rest_api_init',
      function(){
        register_rest_route(
          API_ROUTE,
          '/list',
          array(
            'methods' => array('GET', 'POST'),
            'callback' => array(new ControllerList(), 'apiList'),
            'permission_callback' => '__return_true'
          )
        );
      });
     
    }

  }

