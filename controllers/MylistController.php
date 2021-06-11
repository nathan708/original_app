<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/MylistModel.php');

// ログインしている状態か確認
function log_check() {
    session_start();

    // このコードはどのページに行っても必要なのでは？
    // ログインをして、最後に動作をしたのは一時間以内か
    if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
        $_SESSION['time'] = time();

    } else {
      // でなければ、ログイン画面へ遷移する
        header( "Location: /login" );
    }
}



// マイページのトップ画面
function top_index(){
// Sessionが入ってるか確認
    log_check();
    // 呼び出したいユーザーIDをを指定
    $user_id = $_SESSION['id'];
    // ユーザー情報を呼び出す
    $user = get_user($user_id);

    // ビュー読み込み
    require(dirname(__FILE__).'/../views/mypage.php');


}


// サブスク登録画面
function mylist_regist(){
    log_check();

    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;

    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist_regist.php');

}

// サブスク登録確認画面
function mylist_regist_conf(){
    log_check();
    
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
        if (empty($_POST['monthly_fee'])) {
            $error['monthly_fee'] = 'blank';
            }elseif ($_POST['monthly_fee'] <= 0) {
                $error['monthly_fee'] = 'wrong';
        }
        if (empty($_POST['payment_date'])) {
            $error['payment_date'] = 'blank';
        }
        if (empty($_POST['payment_method'])) {
            $error['payment_method'] = 'blank';
        }
// エラーが無ければ登録
        if (empty($error)) {
            var_dump($_POST);
            require(dirname(__FILE__).'/../views/mylist_regist_conf.php');
        }else {
            require(dirname(__FILE__).'/../views/mylist_regist.php');
        } 
    }
}

// サブスク登録完了画面
function mylist_regist_fin(){
    log_check();

    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;

    if(!empty($_POST)) {
        unset($_POST['regist']);
        
    }
    // POST値をDB処理するパラメータとして定義
    $db_param = $_POST;
    // サブスクリプション登録処理(返り値に登録した情報)
    $mylist = mylist_insert($db_param);
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist_regist_fin.php');
    
}

// 登録しているサブスクの一覧表示
function mylist(){

    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist.php');
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