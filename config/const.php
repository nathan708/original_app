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

  '/login' => array(
    'controller'    =>  'LoginController',
    'get_function'  =>  'input',
    'post_function' =>  'login'
  ),

  '/pass_form' => array(
    'controller'    =>  'PassFormController',
    'get_function'  =>  'input',
    'post_function' =>  'send'
  ),

  '/contact' => array(
    'controller'    =>  'ContactController',
    'get_function'  =>  'input',
    'post_function' =>  'send'
  ),

  '/delete' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  'delete',
    'post_function' =>  'send'
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
  'LOGIN'    => 'ログイン',
  'PASSFORM'    => 'パスワード再設定',
  'CONTACT'     => 'お問い合わせ',
  'USERDELETE'     => 'ユーザー情報削除',

);



?>