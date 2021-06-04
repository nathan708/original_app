<?php

// 入力画面表示
function create(){

    session_start();
    // タイトル
    $page_title = PAGE_TITLE['SIGNUP'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_signup.php');
}

// 登録処理

function signup(){
   // ※付きは課題
    // ※アカウントを重複しないようにするには
    session_start();
    $page_title = PAGE_TITLE['SIGNUP'];

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
        // エラーが有るなら書き直す
        if (!empty($error)){
            require(dirname(__FILE__).'/../views/user_signup.php');
        }else{
            // POSTからsend を外す
            unset($_POST['send']);
            // passwordconf も外す
            unset($_POST['password_conf']);

            // 確認画面のためのSession
            $_SESSION['signup'] = $_POST;
            require(dirname(__FILE__).'/../views/user_signup_conf.php');
            }
    }
        // ※書き直し---sessionがうまく効かず
    if ($_REQUEST['action'] == 'rewrite' && isset($_SESSION['signup'])){
        $_POST = $_SESSION['signup'];
    }
}

// 確認画面
function signup_fin(){
    session_start();
    // View関係
    $page_title = PAGE_TITLE['TOP'];
    
    // ※データベースに接続したら 完了画面に遷移したい
    
    //中身が無ければもとに戻す


        
        // ※登録するが押されたらデータベースに接続して、データベースに挿入する
        // if (!empty($_POST)) {
            // // POST値をDB処理するパラメータとして定義
            // $db_param = $_POST;
            // // ユーザー登録処理（返り値に登録したユーザー情報）
            // $user = user_insert($db_param);
            
            // ビューファイル読み込み
            //   unset($_SESSION['signup']);
            //     require(dirname(__FILE__).'/../views/signup_fin.php');
            unset($_SESSION);
            require(dirname(__FILE__).'/../views/user_signup_fin.php');

}


// 削除確認画面 お問い合わせに組み込んだが、ログインしてから出ないと消せないはず
function delete(){

    // View関係
    $page_title = PAGE_TITLE['DELETE'];
    require(dirname(__FILE__).'/../views/user_delete.php');

    // データベースから引っ張って画面に写したい



    // ※データベースに接続したら 完了画面に遷移したい
    
    //中身が無ければもとに戻す
    // if (!isset($_SESSION['signup'])) {
    //       header('Location: signup.php');
    //       exit();

        
        // ※登録するが押されたらデータベースに接続して、データベースに挿入する
        // if (!empty($_POST)) {
            // // POST値をDB処理するパラメータとして定義
            // $db_param = $_POST;
            // // ユーザー登録処理（返り値に登録したユーザー情報）
            // $user = user_insert($db_param);
            
            // ビューファイル読み込み
            //   unset($_SESSION['signup']);
            //     require(dirname(__FILE__).'/../views/signup_fin.php');
            require(dirname(__FILE__).'/../views/user_signup_fin.php');
        
}

function send() {
    // これはこのままで良いのか？
    if (empty($_POST)) {
            require(dirname(__FILE__).'/../views/user_delete.php');
    } else {
        // dbから削除する記述
        require(dirname(__FILE__).'/../views/user_delete_fin.php');

    }
}