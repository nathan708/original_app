<?php

function index(){
    // ※付きは課題
    // ※アカウントを重複しないようにするには
    session_start();
    // エラーチェック
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
$page_title = PAGE_TITLE['SIGNUP'];
    require(dirname(__FILE__).'/../views/signup.php');
}

function test2(){

    require(dirname(__FILE__).'/../models/TestModel.php');

    $string = 'テスト12345';

    require(dirname(__FILE__).'/../views/view_sample.php');
}