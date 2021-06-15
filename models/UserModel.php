<?php 


// ユーザー登録処理
function user_insert($param){
    // DBの接続
    // try {
        $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // } catch(PDOException $e) {
    //     print('DB接続エラー:' . $e->getMessage());
    // }
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

// アカウントの重複をチェック・・・機能していない
function address_duplicate() {

    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    $user = $dbh->prepare('SELECT COUNT(*) AS cnt FROM users WHERE address=?');
    $user->execute(array($_POST['address']));
    $record = $user->fetch();
    return $record;
    $dbh = null;
}

// ログイン処理
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
            return $user ;
        }    
    }
}

// ユーザーの情報を呼び出す・・・これはここで良いのか？
function get_user($user_id) {
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    $query = "SELECT * FROM users WHERE id = {$user_id}";

    $user = $dbh->query($query); 

    $dbh = null;
    return $user;
    
}



// ユーザー削除処理
function all_delete($delete_id) {
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
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