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
  '/create' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  'enter',
    'post_function' =>  'create'
  ),
// 新規登録確認ー完了
  '/create/fin' => array(
    'controller'    =>  'UserController',
    'get_function'  =>  '',
    'post_function' =>  'create_fin'
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
    'post_function' =>  'destroy'
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
    '/mypage/mylist/create' => array(
      'controller'    =>  'MyListController',
      'get_function'  =>  'mylist_enter',
      'post_function' =>  'mylist_create'
    ),
    // マイリスト登録確認ー完了
      '/mypage/mylist/create/fin' => array(
        'controller'    =>  'MyListController',
        'get_function'  =>  '',
        'post_function' =>  'mylist_create_fin'
      ),

// マイリスト編集
  '/mypage/mylist/edit' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  '',
    'post_function' =>  'mylist_edit'
  ),
// マイリスト編集ー完了
  '/mypage/mylist/edit/fin' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_edit',
    'post_function' =>  'mylist_edit_fin'
  ),
// マイリスト削除
  '/mypage/mylist/delete' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  '',
    'post_function' =>  'mylist_delete'
  ),
// マイリスト削除ー完了
  '/mypage/mylist/delete/fin' => array(
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
  'CREATE'    => 'ユーザー新規登録',
  'LOGIN'    => 'ログイン',
  'PASSFORM'    => 'パスワード再設定',
  'CONTACT'     => 'お問い合わせ',
  'USERDELETE'     => 'ユーザー情報削除',
  'LOGOUT'     => 'ログアウト',
  'SUBSCRIPTION_LIST' => 'サブスクリプション登録一覧',
  'MYLIST_ENTER' => 'サブスクリプション入力画面',
  'MYLIST_CREATE' => 'サブスクリプション入力確認画面',
  'MYLIST_CREATE_FIN' => 'サブスクリプション登録完了画面',


  
  

);
  


// エラーメッセージ
const ERROR_MEASSAGE = array(
  'BLANK' => '入力されていない項目があります。',
  'WRONG' => '１つ目のパスワードと同じものを入力してください',
  'LENGTH' => '4文字以上で入力してください',
  'DUPLICATE' => '指定されたアドレスは登録済みです',
  'LOGIN_FAILED'   => 'メールアドレスとパスワードが一致しません。'
);


// セレクタ関連
const GENRE = array(
  '未選択', '音楽', '動画' ,'本・雑誌', 'ウェブサービス', 'ショッピング', 'その他',
);

const PAYMENT_TYPE = array(
  '未選択', '月額' ,'年額', 'その他'
);

const PAYMENT_METHOD = array(
  '未選択', "クレジットカード", "銀行引き落とし", "その他"
);
const PAYMENT_MONTH = array(
  "未選択", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
);
const PAYMENT_DAY = array(
  "未選択", 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23,24, 25, 26, 27, 28, 29, 30, 31
);


?>