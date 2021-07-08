<?php
// ユーザモデルの読み込み　ほとんどのfunctionで呼び出しているから最初に定義
require(dirname(__FILE__).'/../models/UserModel.php');


// 入力画面表示
function enter(){
    // タイトル
    $page_title = PAGE_TITLE['CREATE'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_create.php');
}


// 確認画面・エラー確認
function create(){
    
    $page_title = PAGE_TITLE['CREATE'];
    $validation_msg = '';
    require(dirname(__FILE__).'/../views/user_create_conf.php');
    

    // バリデーション
    // if (!empty($_POST)){
    //     // 空欄確認
    //     if (empty($_POST['name']) ||
    //         empty($_POST['address'])||
    //         empty($_POST['password'])||
    //         empty($_POST['password_conf'])
    //         ) {
    //             $error['blank'] = 'blank';
    //             $validation_msg = ERROR_MEASSAGE['BLANK'];
    //         }
    //     //メールアドレス正規表現 
    //     $address_pattern = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
    //     $email = $_POST['address'];
    //     if (!preg_match($address_pattern, $email)) {
    //         $error['address'] = 'email';
    //         $error_msg_address = ERROR_MEASSAGE['EMAIL'];
    //         }


    //     // パスワード正規表現（アルファベット大文字・小文字・数字を１種類以上使用）
    //     $password = $_POST['password'];
    //     $password_pattern = "/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{4,10}+\z/";
    //     if (!preg_match($password_pattern, $password)){
    //         $error['password'] = 'unsafe';
    //         $error_msg_password = ERROR_MEASSAGE['UNSAFE'];

    //         // パスワードが一致しているか
    //     }elseif ($_POST['password'] !== $_POST['password_conf']) {
    //         $error['password_conf'] = 'wrong';
    //         $error_msg_password_conf = ERROR_MEASSAGE['WRONG'];
    //     }

    //     // エラーが無いなら、確認画面にいく
    //     if (empty($error)){
    //         // アドレスの重複チェック
    //         $record = address_duplicate();
    //         if ($record['cnt'] > 0 ) {
    //             $error['address'] = 'duplicate';
    //             $error_msg_address = ERROR_MEASSAGE['DUPLICATE'];

    //             }
    //     }
    //     // エラーが無く書き直しでも無ければ
    //     if (empty($error) && empty($_POST['rewrite'])){
    //         // トップページタイトル再定義
    //         $page_title = PAGE_TITLE['CREATE_CONF'];
    //         // ビューファイル読み込み
    //         require(dirname(__FILE__).'/../views/user_create_conf.php');
    //         // エラーが有るなら書き直す
    //     }else{
    //         require(dirname(__FILE__).'/../views/user_create.php');
    //         }
    // }
}

// 確認画面ー登録処理
function create_fin(){
    
    // ※「登録する」が押されたらデータベースに接続して、データベースに挿入する
    
    // ワンタイムトークン確認
    session_start();
    $token = filter_input(INPUT_POST, 'one_token');
    
    // // トークンがない、もしくは一致しない場合、処理を中止
    if (!isset($_SESSION['one_token']) || $token !== $_SESSION['one_token']) {
        exit('不正なリクエスト');
    }
    unset($_SESSION['one_token']);



    //中身が無ければもとに戻す
    // POSTからいらないものを外す
    if (!empty($_POST)) {
        unset($_POST['create']);
        unset($_POST['one_token']);
    
        // // POST値をDB処理するパラメータとして定義
        $db_param = $_POST;
        // // ユーザー登録処理（返り値に登録したユーザー情報）
        $user = user_insert($db_param);

        // ページタイトル定義
        $page_title = PAGE_TITLE['CREATE_FIN'];
        // ビューファイル読み込み
        require(dirname(__FILE__).'/../views/user_create_fin.php');
    }
}


// ユーザー情報変更画面
function change(){
    login_check();

    // View関係
    $page_title = PAGE_TITLE['USER_CHANGE'];
    
    // データベースから引っ張って画面に写したい
    $user_id = $_SESSION['id'];
    //ユーザIDを元に取得
    $user = get_user($user_id);
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_change.php');
}

// ユーザー情報変更確認
function change_conf() {
    login_check();
    
    // 空白なら元のユーザー名とメールアドレスを入れる
    // DBから呼び出す
    // データベースから引っ張って画面に写したい
    $user_id = $_SESSION['id'];
    //ユーザIDを元に取得
    $user = get_user($user_id);

    foreach($user as $key => $value) {
        $user = $value;
    }


    // エラーチェック
    if(!empty($_POST) && empty($_POST['rewrite'])) {
        if($_POST['name'] === "") {
            $_POST['name'] = $user['name'];
        }
        if($_POST['address'] === "") {
            $_POST['address'] = $user['address'];
        }

        // 元のアドレスと違うアドレスの重複チェック
        if($_POST['address'] !== $user['address']) {
            
            $record = address_duplicate();
            if ($record['cnt'] > 0 ) {
                $error['address'] = 'duplicate';
            }
        }

        if(empty($error)) {
            // ビューファイルを読み込む
            $page_title = PAGE_TITLE['USER_CHANGE_CONF'];
            require(dirname(__FILE__).'/../views/user_change_conf.php');

        } else{
            $user = array($user);
            $page_title = PAGE_TITLE['USER_CHANGE'];
            require(dirname(__FILE__).'/../views/user_change.php');
        }
    } else {
        $user = array($user);
        $page_title = PAGE_TITLE['USER_CHANGE'];
        require(dirname(__FILE__).'/../views/user_change.php');
    }
}

// 登録処理ー完了画面
function change_fin() {
    
    // ※「登録する」が押されたらデータベースに接続して、データベースに挿入する
    login_check();

    $user_id = $_POST['user_id'];
    //中身が無ければもとに戻す
    // POSTからいらないものを外す
    if (!empty($_POST)) {
        unset($_POST['user_change']);
        unset($_POST['user_id']);
        
        // POST値をDB処理するパラメータとして定義
        $db_param = $_POST;
        // ユーザー登録処理（返り値に登録したユーザー情報）
        $user = users_update($db_param, $user_id);

        //完了画面表示のため呼び出す
        $user = get_user($user_id);
        // ページタイトル定義
        $page_title = PAGE_TITLE['USER_CHANGE_FIN'];
        // ビューファイル読み込み
        require(dirname(__FILE__).'/../views/user_change_fin.php');
    }
}


// パスワード変更入力画面
function change_password() {
    login_check();
    // ページタイトル定義
    $page_title = PAGE_TITLE['USER_CHANGE_FIN'];
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_pass_change.php');
}

// パスワード変更処理ー完了画面
function pass_change_fin() {
    
    login_check();

    $page_title = PAGE_TITLE['PASSWORD_CHANGE_FIN'];

    // バリデーション
    if (!empty($_POST)){

        // パスワード正規表現を定義（アルファベット大文字・小文字・数字を１種類以上使用）
        $password = $_POST['password'];
        $password_pattern = "/\A(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{4,10}+\z/";

        // 空欄確認
        if (empty($_POST['password']) || empty($_POST['password_conf'])){
                $error = $error['password'] = 'blank';
                $validation_msg = ERROR_MEASSAGE['BLANK'];
                require(dirname(__FILE__).'/../views/user_pass_change.php');

                // パスワード最低文字数
            } elseif (strlen($_POST['password']) < 4 || !preg_match($password_pattern, $password)){
                $error = $error['password'] = 'unsafe';
                $validation_msg = ERROR_MEASSAGE['UNSAFE'];
                require(dirname(__FILE__).'/../views/user_pass_change.php');


            // パスワードが一致しているか
            } elseif ($_POST['password'] !== $_POST['password_conf']) {
                $error = $error['password'] = 'wrong';
                $validation_msg = ERROR_MEASSAGE['WRONG'];
                require(dirname(__FILE__).'/../views/user_pass_change.php');

            // エラーがないのであれば
            }elseif (empty($error)) {
            // idをSessionから定義
            $user_id = $_SESSION['id'];
            
            // POSTからいらないものを外す
                unset($_POST['password_conf']);
                unset($_POST['user_change_conf']);
            // POST値をDB処理するパラメータとして定義
            $db_param = $_POST;
            // ユーザー登録処理（返り値に登録したユーザー情報）
            $user = users_update($db_param, $user_id);

            // ビューファイル読み込み
            require(dirname(__FILE__).'/../views/user_pass_change_fin.php');
        } else {
            require(dirname(__FILE__).'/../views/user_pass_change.php');
        }
    }else {
        require(dirname(__FILE__).'/../views/user_pass_change.php');

    }
}




// 削除確認画面
function delete(){
    login_check();

    // View関係
    $page_title = PAGE_TITLE['USER_DELETE'];
    
    // データベースから引っ張って画面に写したい
    $user_id = $_SESSION['id'];
    //ユーザIDを元に取得
    $user = get_user($user_id);
    
    // ビューファイル読み込み
    require(dirname(__FILE__).'/../views/user_delete.php');
}

// 削除処理
function destroy() {
    login_check();

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
    $page_title = PAGE_TITLE['USER_DELTE_FIN'];
    require(dirname(__FILE__).'/../views/user_delete_fin.php');

}