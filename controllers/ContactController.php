<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/MylistModel.php');


// 入力画面表示
function input() {
    session_start();
    // log_check();

    // タイトル
    $page_title = PAGE_TITLE['CONTACT'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/contact.php');
}

// 送信処理
function send(){
    session_start();

    $page_title = PAGE_TITLE['CONTACT'];
// エラーチェック
    if (!empty($_POST)){
        if (empty($_POST['name'])){
            $error['name'] = 'blank';
        }
        if (empty($_POST['email'])){
            $error['email'] = 'blank';
        }
        //メールアドレス正規表現 
        $address_pattern = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
        $email = $_POST['address'];
        if (!preg_match($address_pattern, $email)) {
            $error['address'] = 'email';
            }

        if (empty($_POST['description'])){
            $error['kanso'] = 'blank';
        }
        if (!empty($error)) {
            require(dirname(__FILE__).'/../views/contact.php');
            exit;
        } else {
            // 内容を送るDB処理
            require(dirname(__FILE__).'/../views/contact_fin.php');
        }

    }

}