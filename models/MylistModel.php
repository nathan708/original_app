<?php 

// ログイン処理　及び　ユーザー情報
function login_check() {
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // 空ならログイン処理を行わない
    if(!empty($_POST)) {
        if ($_POST['address'] !== '' && $_POST['password'] !== '') {
            $login = $dbh->prepare('SELECT * FROM users WHERE address=? AND password=?');
            $login->execute(array (
                $_POST['address'],
                $_POST['password']
            ));
            $user = $login->fetch();
            $dbh = null;

            return $user ;
        }    
    }
}

// ユーザーの情報を呼び出す
function get_user($user_id) {
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);

    $users = $dbh->prepare('SELECT * FROM users WHERE id=?');
    $users->execute(array($_SESSION['id']));
    $user = $users->fetch();
    $dbh = null;
    return $user;
    
    // ビューファイル読み込み
    // require(dirname(__FILE__).'/../views/mypage.php');
}



// マイリスト登録処理
function mylist_insert($param){
    // DBの接続
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // columnes配列の定義
    $columns = array();
    // $values配列の定義
    $values = array();
    // DB処理を行うパラメータの整形　insert文を作る
    foreach($param as $key => $value){
        // $columunes配列に$keyを追加
        $columns[] = $key;
        // $values配列に＄valueを追加　間に'を挟む
        $values[] = "'" . $value . "'";
    }
    // $columnes配列をカンマ区切りで文字列に整形
    $columns = implode(',', $columns);
    // $values配列をカンマ区切りで文字列に整形
    $values = implode(',', $values);
    //  userテーブルへの登録処理用のSQL
    $query = "INSERT INTO services ({$columns}) VALUES ({$values});";
     // SQL実行　insert int users (user_id,name,genre,payment_type,monthly_fee,payment_date,payment_method,note) VALUES ('test', 'tokyo', '1234')
    $dbh->query($query);
    // 登録処理を実行したユーザーIDを取得　上で最終的に登録したもの　表示するため
    $insert_id = $dbh->lastInsertId();
    // 登録したユーザー情報を取得する
    $query = "SELECT * FROM services WHERE id = {$insert_id};";
    // SQL実行
    $result = $dbh->query($query);

    // 接続を閉じる
    $dbh = null;

    return $result;
}