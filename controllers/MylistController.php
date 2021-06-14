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



// マイページのトップ画面　未完
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
    // 多重投稿のためもう一度読み込む
    header("Location: /mypage/mylist/regist/fin");
    // require(dirname(__FILE__).'/../views/mylist_regist_fin.php');

}


// mylist 一覧を呼び出せれば。。。　トップページができればこちらも
// 多重投稿防止の為
function mylist_regist_conp() {
    log_check();


    $mylist = mylist_last_insert();
    

    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist_regist_fin.php');

}

// 登録しているサブスクの一覧表示
function mylist(){



    
    // Sessionに入っているか確認
    log_check();
    // user_idを取り込む
    $user_id = $_SESSION['id'];
    // 特定のuser_idの登録データを読み込む
    $myservices = get_services_all($user_id);




    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist.php');
}





// マイリスト編集画面表示 ///idの数字を変えたら他の人のデータを編集できるのでは。
function mylist_edit(){
    log_check();

    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;
    
    // GETパラーメータとして付与されているidをユーザIDをとして定義
    $service_id = $_GET['id'];
    // サービスIDを元に更新対象のデータ情報の取得
    $service = get_service($service_id);

    // DBから引っ張ってくる。”編集”をクリックした時点でidとリンクしていないといけないのでは
    require(dirname(__FILE__).'/../views/mylist_edit.php');

}

// マイリスト更新処理ー完了画面
function mylist_edit_fin(){
    log_check();

    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_method = PAYMENT_METHOD;

    $service_id = $_GET['id'];

    // エラーチェック
    if (!empty($_POST)) {
        if (empty($_POST['name'])) {
            $error['name'] = 'blank';
        }
        if ($_POST['genre'] <= 0) {
            $error['genre'] = 'blank';
        }
        if ($_POST['payment_type'] <= 0) {
            $error['payment_type'] = 'blank';
        }
        if (empty($_POST['monthly_fee'])) {
            $error['monthly_fee'] = 'blank';
            } elseif ($_POST['monthly_fee'] <= 0) {
            $error['monthly_fee'] = 'wrong';
        }
        if (empty($_POST['payment_date'])) {
            $error['payment_date'] = 'blank';
        }
        if ($_POST['payment_method'] <= 0) {
            $error['payment_method'] ;
        }
        
        // エラーが無ければDBに送って　次に進む
        if (!empty($error)){
            $service = get_service($service_id);
            require(dirname(__FILE__).'/../views/mylist_edit.php');
            exit;
        }else {
            unset($_POST['submit']);
            $db_param = $_POST;
            $service = services_update($db_param, $service_id);

            require(dirname(__FILE__).'/../views/mylist_edit_fin.php');

            
        }
    }
}


// 削除画面表示
function mylist_delete(){
    log_check();

    // DBから引っ張ってくる　削除　をクリックした時点でidと照合されてないといけない

     // GETパラメータとして付与されているidをユーザIDとして定義
    $service_id = $_GET['id'];
    // 指定された情報読み込み
    $service = get_service($service_id);
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist_delete.php');
}

// 削除処理
function mylist_delete_fin(){
    // DBに接続しデータを削除する
    // getパラメータのidをサービスidとして定義
    $service_id = $_GET['id'];
    // サービスidをもとに削除対象のユーザー情報の取得
    $service = get_service($service_id);
    // サービスidを元に削除処理
    service_delete($service_id);

    // ビューファイルの読み込み
    require(dirname(__FILE__).'/../views/mylist_delete_fin.php');

}