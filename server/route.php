<?php
// 定数ファイルの読み込み
require(dirname(__FILE__).'/../config/const.php');

// ドメイン以降のアクセスされたURLを取得
$url = $_SERVER['REQUEST_URI'];
// 取得したURLにはGETパラメータが許可されているため、"?"以降を除外
$url = strtok($url,'?');


// アクセス時に使用されたメソッド（ GET or POST ）
$method = $_SERVER['REQUEST_METHOD'];

// 指定されたURLが定数に存在するかどうかのフラグを定義
$url_exists_flg = false;


// ルーティング定数を対象に繰り返し処理
foreach(ROUTE_LIST as $key => $value){

    if($url === $key){
        // URLの存在フラグを立てる　差し替えてあげている でないと一番下のエラーが呼び出されてしまう。
        $url_exists_flg = true;

        // コントローラーの呼び出し
        require(dirname(__FILE__).'/../controllers/'.$value['controller'].'.php');
        //  GETメソッドなら
        if($method == 'GET') {
            $value['get_function']();
        // POSTなら
        }elseif ($method == 'POST') {
            $value['post_function']();
        }
        break;
    }
}


// アクセスされたURLがルーティング定義に存在しなかった場合
if($url_exists_flg === false){
    // エラーコントローラの呼び出し
    require(dirname(__FILE__).'/../controllers/ErrorController.php');
    // // 404エラー用の関数を実行
    error_404();
}
