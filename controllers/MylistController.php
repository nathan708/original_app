<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/MylistModel.php');


// マイページのトップ画面　未完
function top_index(){
// Sessionが入ってるか確認
    log_check();

    // 呼び出したいユーザーIDをを指定
    $user_id = $_SESSION['id'];
    // 指定のユーザー情報を呼び出す  名前を表示するため
    $user = get_user($user_id);

    // その月の総額を読み込む
    $amount = get_amount($user_id); 
    
    $sum = 0;
    foreach($amount as $value){
        $sum = $sum + $value['monthly_fee'];
    }

    // 指定のユーザーのservice情報を呼び出す
    $services = get_services_all($user_id);

    // ビュー読み込み
    require(dirname(__FILE__).'/../views/mypage.php');
}


// サブスク登録画面
function mylist_create(){
    log_check();

    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_month = PAYMENT_MONTH;
    $payment_day = PAYMENT_DAY;
    $payment_method = PAYMENT_METHOD;

    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist_create.php');
}

// サブスク登録確認画面
function mylist_create_conf(){
    
    log_check();

       // ワンタイムトークン確認
    $token = filter_input(INPUT_POST, 'one_token');


    // var_dump($_SESSION['one_token']);
    // var_dump($token);
    
    // トークンがない、もしくは一致しない場合、処理を中止
    // if (!isset($_SESSION['one_token']) || $token !== $_SESSION['one_token']) {
    //     exit('不正なリクエスト');
    // }
    // unset($_SESSION['one_token']);
    
    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_month = PAYMENT_MONTH;
    $payment_day = PAYMENT_DAY;
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
                $error['monthly_fee'] = 'under';
        }
        // if (empty($_POST['payment_date'])) {
        //     $error['payment_date'] = 'blank';
        // }
        if (empty($_POST['payment_method'])) {
            $error['payment_method'] = 'blank';
        }
// エラーが無ければ表示
        if (empty($error)) {
            require(dirname(__FILE__).'/../views/mylist_create_conf.php');
        }else {
            
            require(dirname(__FILE__).'/../views/mylist_create.php');
        } 
    }
}

// サブスク登録完了画面
function mylist_create_fin(){
    log_check();


    // var_dump($_SESSION['one_token']);


    // var_dump($_POST['one_token']);

    $token = filter_input(INPUT_POST, 'one_token');


    // if (!isset($_SESSION['one_token']) || $token !== $_SESSION['one_token']) {
    //     exit('不正なリクエスト');
    // }
    // unset ($_SESSION['one_token']);

    $genre = GENRE;
    $payment_type = PAYMENT_TYPE;
    $payment_month = PAYMENT_MONTH;
    $payment_day = PAYMENT_DAY;
    $payment_method = PAYMENT_METHOD;

    // $_POST の月日と9999年をくっつけて改めて作る
    $payment_day = "9999" . "-" . $_POST['payment_month'] . "-" . $_POST['payment_day'];
    $_POST['payment_date'] = $payment_day;

    if(!empty($_POST)) {
        unset($_POST['create']);
        unset($_POST['one_token']);
        unset($_POST['payment_month']);
        unset($_POST['payment_day']);
    }
    
    // POST値をDB処理するパラメータとして定義
    $db_param = $_POST;
    // サブスクリプション登録処理(返り値に登録した情報)
    $mylist = mylist_insert($db_param);

    // ビューファイルの読み込み
    require(dirname(__FILE__).'/../views/mylist_create_fin.php');
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
    $payment_month = PAYMENT_MONTH;
    $payment_day = PAYMENT_DAY;
    $payment_method = PAYMENT_METHOD;

    // POST値で付与されているidをユーザIDをとして定義
    $service_id = $_POST['service_id'];

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
    $payment_month = PAYMENT_MONTH;
    $payment_day = PAYMENT_DAY;
    $payment_method = PAYMENT_METHOD;

    $service_id = $_POST['service_id'];
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
            $error['payment_method'] = 'blank';
        }
        
        // エラーが無ければDBに送って　次に進む
        if (!empty($error)){

            $service = get_service($service_id);
            require(dirname(__FILE__).'/../views/mylist_edit.php');

        }else {
            unset($_POST['submit']);
            unset($_POST['service_id']);
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

     // POST値のidをユーザIDとして定義
    $service_id = $_POST['service_id'];
    // 指定された情報読み込み
    $service = get_service($service_id);
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/mylist_delete.php');
}

// 削除処理
function mylist_delete_fin(){
    log_check();
    // DBに接続しデータを削除する
    // POSTでservice_idを定義
    $service_id = $_POST['service_id'];
    // サービスidをもとに削除対象のユーザー情報の取得
    $service = get_service($service_id);
    // サービスidを元に削除処理
    service_delete($service_id);

    // ビューファイルの読み込み
    require(dirname(__FILE__).'/../views/mylist_delete_fin.php');

}