<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/UserModel.php');


// 入力画面表示
function create(){

    // タイトル
    $page_title = PAGE_TITLE['SIGNUP'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_signup.php');
}

// 登録処理

function signup(){
    $page_title = PAGE_TITLE['SIGNUP'];
    $validation_msg = '';

   // ワンタイムトークン確認
    session_start();
    $token = filter_input(INPUT_POST, 'one_token');
   // トークンがない、もしくは一致しない場合、処理を中止
    if (!isset($_SESSION['one_token']) || $token !== $_SESSION['one_token']) {
        exit('不正なリクエスト');
    }
        unset($_SESSION['one_token']);


    // エラーチェック
    if (!empty($_POST)){
        if (empty($_POST['name']) ||
            empty($_POST['address'])||
            empty($_POST['password'])||
            empty($_POST['password_conf'])
            ) {
                $error['blank'] = 'blank';
                $validation_msg = ERROR_MEASSAGE['blank'];
            }
        
        if (strlen($_POST['password']) < 4 ){
            $error['password'] = 'length';
        }
            
        if ($_POST['password'] !== $_POST['password_conf']) {
            $error['password_conf'] = 'wrong';
        }
        if (strlen($_POST['password_conf']) < 4 ){
            $error['password_conf'] = 'length';
        }

        // エラーが無いなら、確認画面にいく
        if (empty($error)){
            // アドレスの重複チェック
            $record = address_duplicate();
            if ($record['cnt'] > 0 ) {
                $error['address'] = 'duplicate';
                }
        }        
        if (empty($error)){
            require(dirname(__FILE__).'/../views/user_signup_conf.php');
            // エラーが有るなら書き直す
        }else{
            require(dirname(__FILE__).'/../views/user_signup.php');
            }
    }
}

// 確認画面
function signup_fin(){
    
    // ※「登録する」が押されたらデータベースに接続して、データベースに挿入する

    // ワンタイムトークン確認
    session_start();
    $token = filter_input(INPUT_POST, 'one_token');
    // トークンがない、もしくは一致しない場合、処理を中止
    if (!isset($_SESSION['one_token']) || $token !== $_SESSION['one_token']) {
        exit('不正なリクエスト');
    }
    unset($_SESSION['one_token']);



    //中身が無ければもとに戻す
    // POSTからいらないものを外す
    if (!empty($_POST)) {
        unset($_POST['regist']);
        unset($_POST['one_token']);
    
        // // POST値をDB処理するパラメータとして定義
        $db_param = $_POST;
        // // ユーザー登録処理（返り値に登録したユーザー情報）
        $user = user_insert($db_param);


        // ※POSTの値が残っているので、更新すると何回も登録されてしまう
        // ビューファイル読み込み
        require(dirname(__FILE__).'/../views/user_signup_fin.php');
    }
}


// ※削除確認画面 お問い合わせに組み込んだが、ログインしてから出ないと消せないはず
function delete(){
    log_check();

    // View関係
    $page_title = PAGE_TITLE['USERDELETE'];
    
    // データベースから引っ張って画面に写したい
    $user_id = $_SESSION['id'];
    //ユーザIDを元に取得
    $user = get_user($user_id);
    
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_delete.php');
}

// 削除処理
function destroy() {
    log_check();

    // ユーザーIDを取得
    $user_id = $_SESSION['id'];
    // ユーザー情報を取得
    $user = get_user($user_id);
    // ユーザー情報及びサービス情報削除
    all_delete($user_id);


    // セッションの中身を消す
    $_SESSION = array();
    session_destroy();

    //ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_delete_fin.php');

}