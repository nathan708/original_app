<?php 

// ログイン処理　及び　ユーザー情報
function login_check_db() {
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);

    // アドレスとパスワードを呼び出す
    $login = $dbh->prepare('SELECT * FROM users WHERE address=? AND password=?');
    $login->execute(array (
        $_POST['address'],
        $_POST['password']
    ));
    $user = $login->fetch();
    $dbh = null;

    return $user ;
}

// ユーザーの情報を呼び出す・・・これはここで良いのか？
function get_user($user_id) {
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);

    $users = $dbh->prepare('SELECT * FROM users WHERE id=?');
    $users->execute(array($_SESSION['id']));
    $user = $users->fetch();
    $dbh = null;
    return $user;
    
}

// 特定のユーザーのservice一覧を読み込む
function get_services_all($user_id) {
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // ログインuser_idのserviceテーブルの全てのデータを取得する
    $query = "SELECT * FROM services WHERE user_id={$user_id};";
    // SQL実行　
    $stmt = $dbh->query($query);
    // SQLの結果を配列の形で受け取る
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // DB接続を閉じる
    $dbh = null;

    return $result;
}


// 特定のユーザーの当月の支払い一覧を読み込む（トップページ用）
function get_services_month($user_id) {
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);

    // ログインuser_idのserviceテーブルの当月にあたる年額のデータを取得する
    $query = "SELECT *FROM services WHERE user_id = {$user_id} AND payment_type = 2 AND DATE_FORMAT(payment_date, '%m') = MONTH(NOW());";
    // SQL実行
    $stmt = $dbh -> query($query);
    // SQLの結果を配列の形で受け取る
    $yearly = $stmt->fetchAll(PDO::FETCH_ASSOC);
    


    // ログインuser_idのserviceテーブルの月額のデータを取得する
    $query = "SELECT *FROM services WHERE user_id = {$user_id} AND payment_type = 1 ;";
    // SQL実行
    $stmt = $dbh -> query($query);
    // SQLの結果を配列の形で受け取る
    $monthly = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 再定義機するためにそれぞれを一度展開
    foreach ($yearly as $key => $value) {
        $yearly[$key] = $value;
    }

    foreach ($monthly as $key => $value) {
        $monthly[$key] = $value;
    }

    // 空の配列を定義
    $result = array();
    // 合わせたものを定義
    $result = array_merge($yearly, $monthly);

    // DB接続を閉じる
    $dbh = null;

    return $result;
}


// 指定されたserviceを読み込む
function get_service($service_id) {
        // DBの接続
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    
        // 登録したユーザー情報を取得する
        $query = "SELECT * FROM services WHERE id = {$service_id};";
        // SQL実行
        $stmt = $dbh->query($query);
        // SQLの結果を配列の形で受け取る
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
        // 接続を閉じる
        $dbh = null;
    
        return $result;

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


// mylist更新処理
function services_update($param, $update_id) {
    // DB接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // $col_values配列の定義
    $col_values = array();
    // DB処理を行うためのパラメータの整形
    foreach($param as $key => $value) {
        // $columns配列に$key,$valueを使用した文字列を追加する
        $col_values[] = $key . " = '" . $value . "'";
    }
        // $col_values配列をカンマ区切りで文字列に整形
        $col_values = implode(', ', $col_values);
        // serviceテーブルへの更新処理用のSQL
        $query = "UPDATE services SET {$col_values} WHERE id = {$update_id};";
        // SQL実行
        $result = $dbh->query($query);
        // 接続を閉じる
        $dbh = null;
        return $result;
}


// サービス削除処理
function service_delete($delete_id){
        // DBの接続
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
        // serviceテーブルへの削除処理用のSQL
        $query  = "DELETE FROM services WHERE id = {$delete_id}";
        // SQL実行
        $result = $dbh->query($query);
        // 接続を閉じる
        $dbh = null;
        
        return $result;

}
