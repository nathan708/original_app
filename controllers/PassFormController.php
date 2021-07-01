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

    //メールアドレス正規表現 
    $address_pattern = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
    $email = $_POST['address'];

    // エラーチェック
    // 空の場合
    if (!empty($_POST)){
        if (empty($_POST['address']) || !preg_match($address_pattern, $email)){
            $error['address'] = 'blank';
            $error_msg = ERROR_MEASSAGE['EMAIL'];
            require(dirname(__FILE__).'/../views/password_form.php');
            exit;
        } 
        // 連絡が来る記述
            require(dirname(__FILE__).'/../views/password_fin.php');


    }
    
}