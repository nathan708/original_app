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
        if (empty($_POST['password'])){
            $error['password'] = 'blank';
        }
        if (!empty($error)) {
            require (dirname(__FILE__).'/../views/user_login.php');
        }else {
            // DBと合っているかどうか照合 違う場合
            
            
            // ※エラーが無ければ次に進むが どうやってdbと合わせるのか
            
            // if (empty($error)){
                // ???? $_SESSION['join'] = $_POST;
                //     header('Location: mypage.php');
                //     exit();
                // }
                // }
            require (dirname(__FILE__).'/../views/mypage.php');
            }        
    // マイページに行く
    }
}