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
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // 空ならログイン処理を行わない
    if(!empty($_POST)) {
        if ($_POST['address'] !== '' && $_POST['password'] !== '') {
            $login = $dbh->prepare('SELECT * FROM users WHERE address=? AND password=?');
            $login->execute(array (
                $_POST['address'],
                $_POST['password']
            ));
            $member = $login->fetch();
            // ログインに成功していたら
            if($member) {
                $_SESSION['id'] = $member['id'];
                $_SESSION['time'] = time();
                require (dirname(__FILE__).'/../views/mypage.php');
            // ログインに失敗したら
            }else {
                $error['login'] = 'failed';
                require (dirname(__FILE__).'/../views/user_login.php');

            }
        }else {
            $error['login'] = 'blank';
            require (dirname(__FILE__).'/../views/user_login.php');
        }
    }


}


// ログアウト処理
function logout(){
    // DBから解除？　Cookieを消す？

    require (dirname(__FILE__).'/../views/user_logout.php');
}