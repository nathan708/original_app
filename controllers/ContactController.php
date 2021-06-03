<?php

// 入力画面表示
function input(){
    // タイトル
    $page_title = PAGE_TITLE['CONTACT'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/contact.php');
}

// ログイン処理
function send(){
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