<?php 


// ユーザー登録処理
function user_insert($param){
    // DBの接続
    try {
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    } catch(PDOException $e) {
        print('DB接続エラー:' . $e->getMessage());
    }
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
    $query = "INSERT INTO users ({$columns}) VALUES ({$values});";
     // SQL実行　insert int users (name,address,password) VALUES ('test', 'tokyo', '1234')
    $dbh->query($query);
    // 登録処理を実行したユーザーIDを取得　上で最終的に登録したもの　表示するため
    $insert_id = $dbh->lastInsertId();
    // 登録したユーザー情報を取得する
    $query = "SELECT * FROM users WHERE id = {$insert_id};";
    // SQL実行
    $result = $dbh->query($query);
    // 接続を閉じる
    $dbh = null;

    return $result;
}

// アカウントの重複をチェック
function address_duplicate() {
    // DB接続
    try {
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    }catch(PDOException $e) {
        echo 'DB接続エラー：' . $e->getMessage();
    }


    $user = $dbh->prepare('SELECT COUNT(*) AS cnt FROM users WHERE address=?');
    $user->execute(array($_POST['address']));
    $record = $user->fetch();
    return $record;
    $dbh = null;
}

// ログイン処理
function login_check_db() {
    // DB接続
    try {
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    }catch(PDOException $e) {
        echo 'DB接続エラー：' . $e->getMessage();
    }

    $login = $dbh->prepare('SELECT * FROM users WHERE address=? AND password=?');
    $login->execute(array (
        $_POST['address'],
        $_POST['password']
    ));
    $user = $login->fetch();
    return $user ;
}

// ユーザーの情報を呼び出す
function get_user($user_id) {
    // DB接続
    try {
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    }catch(PDOException $e) {
        echo 'DB接続エラー：' . $e->getMessage();
    }
    $query = "SELECT * FROM users WHERE id = {$user_id}";
    // SQL実行
    $stmt = $dbh->query($query); 
    // SQLの結果を配列の形で受け取る
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $dbh = null;
    return $user;
    
}

// ユーザー情報更新処理
function users_update($param, $update_id) {
    // DB接続
    try {
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    }catch(PDOException $e) {
        echo 'DB接続エラー：' . $e->getMessage();
    }
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
        $query = "UPDATE users SET {$col_values} WHERE id = {$update_id};";
        // SQL実行
        $result = $dbh->query($query);
        // 接続を閉じる
        $dbh = null;
        return $result;
}


// ユーザー削除処理
function all_delete($delete_id) {
    // DB接続
    try {
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    }catch(PDOException $e) {
        echo 'DB接続エラー：' . $e->getMessage();
    }
    // serviceテーブルのデータ削除処理用のSQL
    $query = "DELETE FROM services WHERE user_id = {$delete_id}";
    // SQL実行
    $result = $dbh->query($query);

    // userテーブルからのデータ削除
    $query = "DELETE FROM users WHERE id = {$delete_id}";
    // SQL実行
    $user = $dbh->query($query);

    // 接続を閉じる
    $dbh = null;

    return $user;
}