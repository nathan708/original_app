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
  '/mypage/mylist/regist' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_regist',
    'post_function' =>  'mylist_regist_conf'
  ),
// マイリスト登録ー確認ー書き直し
  '/mypage/mylist/regist/rewrite' => array(
    'controller'    =>  'MyListController',
    'get_function'  =>  'mylist_regist',
    'post_function' =>  'mylist_regist'
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
  'SIGNUP'    => 'ユーザー新規登録',
  'LOGIN'    => 'ログイン',
  'PASSFORM'    => 'パスワード再設定',
  'CONTACT'     => 'お問い合わせ',
  'USERDELETE'     => 'ユーザー情報削除',
  'LOGOUT'     => 'ログアウト',

  
  

);
  


// エラーメッセージ
const ERROR_MEASSAGE = array(
  'blank' => '入力されていない項目があります。',
  'wrong' => '１つ目のパスワードと同じものを入力してください',
  'length' => '4文字以上で入力してください',
  'duplicate' => '指定されたアドレスは登録済みです',
  'LOGIN_FAILED'   => 'メールアドレスとパスワードが一致しません。'
);


// セレクタ関連
const GENRE = array(
  '選択してください', '音楽', '動画' ,'本・雑誌', 'ウェブサービス', 'ショッピング', 'その他',
);

const PAYMENT_TYPE = array(
  '選択してください', '月額' ,'年額', 'その他'
);

const PAYMENT_METHOD = array(
  '選択してください', "クレジットカード", "銀行引き落とし", "その他"
);




// ワンタイムトークン生成・・・多重投稿防止
function setToken() {
  // トークンを生成
  // フォームからそのトークンを送信
  // 送信後の画面でそのトークンを照会
  // トークンを削除

  session_start();
  $one_token = bin2hex(random_bytes(32));
  $_SESSION['one_token'] = $one_token;

  return $one_token;
}


// XSS対策：エスケープ処理
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// ログインしている状態か確認
function log_check() {
  session_start();

  // ログインをして、最後に動作をしたのは一時間以内か
  if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
      $_SESSION['time'] = time();

  } else {
    // でなければ、ログイン画面へ遷移する
      header( "Location: /login" );
  }
}
?>