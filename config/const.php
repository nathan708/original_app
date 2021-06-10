<?php 
// DB接続情報
const HOST = '127.0.0.1';
const USERNAME = 'root';
const PASSWORD = 'root';
const DBNAME = 'original_db';
const PORT = '3306';


// ルーティングの一覧

const ROUTE_LIST = array(
  // トップページ
  '/' => array(
    'controller'       => 'TopController',
    'get_function'     =>'top',
    'post_function'    =>''
  ),
// 新規登録
  '/signup' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  'create',
    'post_function' =>  'signup'
  ),
// 新規登録確認ー完了
  '/signup/fin' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  '',
    'post_function' =>  'signup_fin'
  ),
// ログイン処理
  '/login' => array(
    'controller'    =>  'LogInOutController',
    'get_function'  =>  'input',
    'post_function' =>  'login'
  ),
// パスワード問い合わせ処理
  '/pass_form' => array(
    'controller'    =>  'PassFormController',
    'get_function'  =>  'input',
    'post_function' =>  'send'
  ),
// お問い合わせ処理
  '/contact' => array(
    'controller'    =>  'ContactController',
    'get_function'  =>  'input',
    'post_function' =>  'send'
  ),
// ユーザー情報削除
  '/delete' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  'delete',
    'post_function' =>  'send'
  ),
// マイページトップ
  '/mypage' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'top_index',
    'post_function' =>  ''
  ),
// マイリスト一覧
  '/mypage/mylist' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist',
    'post_function' =>  ''
  ),
// マイリスト登録
  '/mypage/mylist/regist' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_regist',
    'post_function' =>  'mylist_regist_conf'
  ),
// マイリスト登録確認ー完了
  '/mypage/mylist/regist/fin' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  '',
    'post_function' =>  'mylist_regist_fin'
  ),
// マイリスト編集
  '/mypage/mylist/edit' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_edit',
    'post_function' =>  'mylist_edit_fin'
  ),
// マイリスト削除
  '/mypage/mylist/delete' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_delete',
    'post_function' =>  'mylist_delete_fin'
  ),
// ログアウト
  '/logout' => array(
    'controller'    =>  'LogInOutController',
    'get_function'  =>  'logout',
    'post_function' =>  ''
  ),






// 指定URL以外を表示した場合のエラー
  '/error' => array(
    'controller'    => 'ErrorController',
    'get_function'  => 'error_404',
    'post_function' => '',
),

);


// トップページ

const PAGE_TITLE = array(
  'TOP'       => 'サブスクリプション管理',
  'SIGNUP'    => 'ユーザー新規登録',
  'LOGIN'    => 'ログイン',
  'PASSFORM'    => 'パスワード再設定',
  'CONTACT'     => 'お問い合わせ',
  'USERDELETE'     => 'ユーザー情報削除',

);
  


// エラーメッセージ
const ERROR_MEASSAGE = array(
  'blank' => '入力してください',
  'wrong' => '同じものを入力してください',
  'length' => '4文字以上で入力してください',
  'duplicate' => '指定されたアドレスは登録済みです',

);


// セレクタ関連
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