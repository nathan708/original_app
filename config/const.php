<?php 
// DB接続情報
const HOST = '127.0.0.1';
const USERNAME = 'root';
const PASSWORD = 'root';
const DBNAME = '';
const PORT = '3306';



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
    'controller'    =>  'LogInOutController',
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

  '/mypage' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'top_index',
    'post_function' =>  ''
  ),

  '/mypage/mylist' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist',
    'post_function' =>  ''
  ),

  '/mypage/mylist/regist' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_regist',
    'post_function' =>  'mylist_regist_conf'
  ),

  '/mypage/mylist/regist/fin' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  '',
    'post_function' =>  'mylist_regist_fin'
  ),

  '/mypage/mylist/edit' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_edit',
    'post_function' =>  'mylist_edit_fin'
  ),

  '/mypage/mylist/delete' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_delete',
    'post_function' =>  'mylist_delete_fin'
  ),

  '/logout' => array(
    'controller'    =>  'LogInOutController',
    'get_function'  =>  'logout',
    'post_function' =>  ''
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
  

const GENRE = array(
  '選択してください', '動画' ,'本・雑誌', 'ウェブサービス', 'ショッピング', 'その他',
);

const PAYMENT_TYPE = array(
  '選択してください', '月額' ,'年額', 'その他'
);

const PAYMENT_METHOD = array(
  '選択してください', "クレジットカード", "銀行引き落とし", "その他"
);

?>