<?php

// 入力画面表示
function input(){
    // タイトル
    $page_title = PAGE_TITLE['PASSFORM'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/password_form.php');
}

// ログイン処理
function send(){
    $page_title = PAGE_TITLE['PASSFORM'];
    
    // エラーチェック
    // 空の場合
    if (!empty($_POST)){
        if (empty($_POST['email'])){
            $error['email'] = 'blank';
            require(dirname(__FILE__).'/../views/password_form.php');
            exit;
        } 
        // 連絡が来る記述
            require(dirname(__FILE__).'/../views/password_fin.php');


    }
    
}