<?php 

// ルーティングの一覧

const ROUTE_LIST = array(
  '/' => array(
    'controller'       => 'TopController',
    'get_function'     =>'index',
    'post_function'    =>''
  ),

  '/signup' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  'create',
    'post_function' =>  'signup'
  ),

  '/signup/fin' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  '',
    'post_function' =>  'signup_fin'
  ),






  '/error' => array(
    'controller'    => 'ErrorController',
    'get_function'  => 'error_404',
    'post_function' => '',
),

);


const PAGE_TITLE = array(
  'TOP'       => 'サブスクリプション管理',
  'SIGNUP'    => 'ユーザー新規登録',
);

?>