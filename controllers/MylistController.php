<?php
// 毎回DBとSessionで照合しないといけないのでは
// 入力画面表示
function top_index(){
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mypage.php');
}

function mylist(){

    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist.php');
}

function mylist_regist(){


    
    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;
    
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist_regist.php');

}

// 確認画面
function mylist_regist_conf(){

    
    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;
    
    // エラーチェック
    if (!empty($_POST)) {

        if (empty($_POST['name'])) {
            $error['name'] = 'blank';
        }
        if (empty($_POST['genre'])) {
            $error['genre'] === 'blank';
        }
        if (empty($_POST['payment_type'])) {
            $error['payment_type'] = 'blank';
        }
        if (empty($_POST['pay'])) {
            $error['pay'] = 'blank';
        }
        if (empty($_POST['payment_date'])) {
            $error['payment_date'] = 'blank';
        }
        if (empty($_POST['payment_method'])) {
            $error['payment_method'] = 'blank';
        }

        if (empty($error)) {
            require(dirname(__FILE__).'/../views/mylist_regist_conf.php');
        }else {
            require(dirname(__FILE__).'/../views/mylist_regist.php');
        } 
    }
}

// 完了画面
function mylist_regist_fin(){
    // session_start();
    // db関係


    // unset ($_SESSION['regist']);
    require(dirname(__FILE__).'/../views/mylist_regist_fin.php');
    
}

// 編集画面
function mylist_edit(){
    
    require(dirname(__FILE__).'/../views/mylist_edit.php');



    
}