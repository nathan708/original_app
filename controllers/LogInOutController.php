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
    if(!empty($_POST)) {
        if($_POST['address'] !== "" && $_POST['password'] !== "") {
        
            // DBで確認する
            $user = login_check_db();
            var_dump($_POST);
            var_dump($user);
            
            // ログインに成功していたら
            if($user) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['time'] = time();
                header("Location: /mypage");
        
            // ログインに失敗したら
            }else {
                $error['login'] = 'failed';
                require (dirname(__FILE__).'/../views/user_login.php');
            }
        }else {
            $error['login'] = 'blank';
            require (dirname(__FILE__).'/../views/user_login.php');
        }
    }
}



// ログアウト処理
function logout(){
session_start();

// セッションの中身を消す
$_SESSION = array();
session_destroy();

    require (dirname(__FILE__).'/../views/user_logout.php');
}