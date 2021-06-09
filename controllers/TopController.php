<?php

function index(){
// URLを取得
$url = $_SERVER['REQUEST_URI'];
// viewファイルの読み込み
require(dirname(__FILE__).'/../views/top.php');
}

