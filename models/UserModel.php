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
