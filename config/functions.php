<?php 

// ワンタイムトークン生成・・・多重投稿防止
function setToken() {
  // トークンを生成
  // フォームからそのトークンを送信
  // 送信後の画面でそのトークンを照会
  // トークンを削除

  session_start();
  $one_token = bin2hex(random_bytes(32));
  $_SESSION['one_token'] = $one_token;

  return $one_token;
}


// XSS対策：エスケープ処理
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// ログインしている状態か確認
function login_check() {
  session_start();

  // ログインをして、最後に動作をしたのは一時間以内か
  if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
      $_SESSION['time'] = time();

  } else {
    // でなければ、ログイン画面へ遷移する
      header( "Location: /login" );
  }
}
?>