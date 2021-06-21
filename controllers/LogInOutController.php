<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/UserModel.php');



// 入力画面表示
function input(){
    // タイトル
    $page_title = PAGE_TITLE['LOGIN'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_login.php');
}

// ログイン処理
function login(){
    $page_title = PAGE_TITLE['LOGIN'];

    session_start();
    if(!empty($_POST)) {
        if($_POST['address'] !== "" && $_POST['password'] !== "") {
        
            // DBで確認する
            $user = login_check_db();
            
            // ログインに成功していたらidをSessionに保存する
            if($user) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['time'] = time();
                header("Location: /mypage");
            // ログインに失敗したらもとのログイン画面に戻る
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