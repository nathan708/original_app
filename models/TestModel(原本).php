<?php

echo 'Model';

$host = '127.0.0.1';
$username = 'root';
$passwd = 'root';
$dbname = 'test_db';
$port = '3306';

$db_link = mysqli_connect($host,$username,$passwd,$dbname,$port);

// 接続状況をチェックします
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
}

echo "データベースの接続に成功しました。\n";

// userテーブルの全てのデータを取得する
$query = "SELECT * FROM users;";

// クエリを実行します。
$users = mysqli_query($db_link, $query);



// 接続を閉じます
mysqli_close($db_link);
