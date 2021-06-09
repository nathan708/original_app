<?php
// 指定されたユーザ情報の取得処理
function get_user($user_id){
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // userテーブルから指定されたユーザIDのデータを取得
    $query = "SELECT * FROM users WHERE id = {$user_id};";
    // SQL実行 pdoに関数が入っている
    $result = $dbh->query($query);
    // DB接続を閉じる
    $dbh = null;

    return $result;

}
// 全ユーザ情報の取得処理
function get_users_all(){
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // userテーブルの全てのデータを取得する
    $query = "SELECT * FROM users;";
    // SQL実行
    $result = $dbh->query($query);
    // 接続を閉じる
    $dbh = null;

    return $result;
}
// ユーザ登録処理
function user_insert($param){
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // $columns配列の定義
    $columns = array();
    // $values配列の定義
    $values = array();
    // DB処理を行うパラメータの整形　insert文を作るための
    foreach($param as $key => $value){
        // $columns配列に$keyを追加
        $columns[] = $key;
        // $values配列に$valueを追加 'を間に挟む
        $values[] = "'" . $value . "'";
    }
    // $columns配列をカンマ区切りで文字列に整形
    $columns = implode(', ', $columns);
    // $values配列をカンマ区切りで文字列に整形
    $values  = implode(', ', $values);
    // userテーブルへの登録処理用のSQL
    $query = "INSERT INTO users ({$columns}) VALUES ({$values});";
    // SQL実行　insert int users (name,address,password) VALUES ('test', 'tokyo', '1234')
    $dbh->query($query);
    // 登録処理を実行したユーザIDを取得　↑最終的に登録
    $insert_id = $dbh->lastInsertId();
    // 登録したユーザ情報を取得する
    $query = "SELECT * FROM users WHERE id = {$insert_id};";
    // SQL実行
    $result = $dbh->query($query);
    // 接続を閉じる
    $dbh = null;

    return $result;
}
// ユーザ更新処理
function user_update($param, $update_id){
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // $col_values配列の定義
    $col_values = array();
    // DB処理を行うパラメータの整形
    foreach($param as $key => $value){
        // $columns配列に$key、$valueを使用した文字列を追加
        $col_values[] = $key . " = '" . $value . "'";
    }
    // $col_values配列をカンマ区切りで文字列に整形
    $col_values = implode(', ', $col_values);
    // userテーブルへの更新処理用のSQL
    $query = "UPDATE users SET {$col_values} WHERE id = {$update_id}";
    // SQL実行
    $result = $dbh->query($query);
    // 更新したユーザ情報を取得する
    $query = "SELECT * FROM users WHERE id = {$update_id};";
    // SQL実行
    $result = $dbh->query($query);
    // 接続を閉じる
    $dbh = null;

    return $result;
}
// ユーザ削除処理
function user_delete($delete_id){
    // DBの接続
    $dbh = new PDO('mysql:host='.HOST.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
    // userテーブルへの削除処理用のSQL
    $query = "DELETE FROM users WHERE id = {$delete_id}";
    // SQL実行
    $result = $dbh->query($query);
    // 接続を閉じる
    $dbh = null;

    return $result;
}