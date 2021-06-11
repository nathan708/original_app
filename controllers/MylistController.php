<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/UserModel.php');

// マイページのトップ画面
function top_index(){
    session_start();
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    
    if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
        $_SESSION['time'] = time();

        $users = $dbh->prepare('SELECT * FROM users WHERE id=?');
        $users->execute(array($_SESSION['id']));
        $user = $users->fetch();
        
        // ビューファイル読み込み
        require(dirname(__FILE__).'/../views/mypage.php');
    
    } else {
      // ログイン画面へ遷移する
        header( "Location: /login" );

    }


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
            $error['genre'] = 'blank';
        }
        if (empty($_POST['payment_type'])) {
            $error['payment_type'] = 'blank';
        }
        if (empty($_POST['pay'])) {
            $error['pay'] = 'blank';
            }elseif ($_POST['pay'] <= 0) {
                $error['pay'] = 'wrong';
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

// マイリスト編集画面　
function mylist_edit(){
    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;


    // DBから引っ張ってくる。”編集”をクリックした時点でidとリンクしていないといけないのでは
    require(dirname(__FILE__).'/../views/mylist_edit.php');

}

// マイリスト更新完了画面
function mylist_edit_fin(){

    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;

        // エラーチェック
        if (!empty($_POST)) {

            if (empty($_POST['name'])) {
                $error['name'] = 'blank';
            }
            if ($_POST['genre'] <= 0) {
                $error['genre'] = 'blank';
            }
            if (empty($_POST['payment_type'])) {
                $error['payment_type'] = 'blank';
            }
            if (empty($_POST['pay'])) {
                $error['pay'] = 'blank';
                } elseif ($_POST['pay'] <= 0) {
                $error['pay'] = 'wrong';
            }
            if (empty($_POST['payment_date'])) {
                $error['payment_date'] = 'blank';
            }
            if (empty($_POST['payment_method'])) {
                $error['payment_method'] = 'blank';
            }
            // エラーが無ければDBに送って　次に進む
            if (!empty($error)){
                require(dirname(__FILE__).'/../views/mylist_edit.php');
                
            }else {
                require(dirname(__FILE__).'/../views/mylist_edit_fin.php');
            }
        }
}


// 削除画面
function mylist_delete(){
    // DBから引っ張ってくる　削除　をクリックした時点でidと照合されてないといけない

    require(dirname(__FILE__).'/../views/mylist_delete.php');

}

function mylist_delete_fin(){
    // DBに接続しデータを削除する

    require(dirname(__FILE__).'/../views/mylist_delete_fin.php');

}