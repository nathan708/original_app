<?php

// 入力画面表示
function create(){
    // タイトル
    $page_title = PAGE_TITLE['SIGNUP'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/signup.php');
}

// 登録処理
function signup(){
   // ※付きは課題
    // ※アカウントを重複しないようにするには
    // session_start();
$page_title = PAGE_TITLE['SIGNUP'];
$validation_msg = '';


    // エラーチェック
    var_dump($_POST);
    if (!empty($_POST)){
        
        if (empty($_POST['name'])){
            $error['name'] = 'blank';
        }
        if (empty($_POST['email'])){
            $error['email'] = 'blank';
        }
        if (strlen($_POST['password']) < 4 ){
            $error['password'] = 'length';
        }
        if (empty($_POST['password'])){
            $error['password'] = 'blank';
        }
        if (empty($_POST['password_conf'])){
            $error['password_conf'] = 'blank';
        }elseif ($_POST['password_conf'] !== $_POST['password']){
            $error['password_conf'] = 'wrong';
        }
        // エラーが有るなら書き直す
        if (!empty($error)){
            $validation_msg = '入力に不備があります。';
            require(dirname(__FILE__).'/../views/signup.php');
        }else{
            // POSTからsend を外す
            unset($_POST['send']);
        }
        
        // エラーが無ければ次に進む
        if (empty($error)){
            $_SESSION['join'] = $_POST;
            header('Location: signup_conf.php');
            exit();
        }
    }
    // ※書き直し
    if ($_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])){
        $_POST = $_SESSION['join'];
    }


}