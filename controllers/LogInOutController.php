<?php

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
    
    // エラーチェック
    // 空の場合
    if (!empty($_POST)){
        if (empty($_POST['email'])){
            $error['email'] = 'blank';
        }
        if (strlen($_POST['password']) < 4 ){
            $error['password'] = 'length';
        }
        if (empty($_POST['password'])){
            $error['password'] = 'blank';
        }
        if (empty($error)) {
            // DBと合っているかどうか照合 違う場合
            // ※エラーが無ければ次に進むが どうやってdbと合わせるのか
            // マイページに行く
            require (dirname(__FILE__).'/../views/mypage.php');
            

            
        }else {
            require (dirname(__FILE__).'/../views/user_login.php');
            }        
    }
}


// ログアウト処理
function logout(){
    // DBから解除？　Cookieを消す？

    require (dirname(__FILE__).'/../views/user_logout.php');
}