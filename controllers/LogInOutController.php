<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/UserModel.php');


// 入力画面表示
function input(){
    // タイトル
    $page_title = PAGE_TITLE['TOP'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_login.php');
}

// ログイン処理
function login(){
    session_start();
    $user = login_check();

    // ログインに成功していたら
        if($user) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['time'] = time();
            header("Location: /mypage");
            // require (dirname(__FILE__).'/../views/mypage.php');

            // ログインに失敗したら
        }else {
            $error['login'] = 'failed';
            require (dirname(__FILE__).'/../views/user_login.php');

            
        }
        // ログインフォームが空なら
    if (empty($_POST)){
        $error['login'] = 'blank';
        require (dirname(__FILE__).'/../views/user_login.php');
    }
}


// ログアウト処理
function logout(){
session_start();

// セッションの中身を消す
$_SESSION = array();
if (ini_set('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name() . '', time() - 42000, 
        $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
session_destroy();

    require (dirname(__FILE__).'/../views/user_logout.php');
}