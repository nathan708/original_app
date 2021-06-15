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
        if (empty($_POST['kanso'])){
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