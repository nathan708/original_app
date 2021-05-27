<?php
// テストテスト更にテスト
// from Youtube
// // エラーメッセージ
// $err = [];


// // バリデーション
// if(!$username = filter_input(INPUT_POST, 'username'));{
//   $err[] = 'ユーザー名を記入してください。';
// }
// if(!$username = filter_input(INPUT_POST, 'email'));{
//   $err[] = 'メールアドレスを記入してください。';
// }
// $password = filter_input(INPUT_POST, 'pass');
// // 正規表現
// if(!preg_match("/\A[a-z\d]{8,100}\z/i",$password)){
//   $err[] = 'パスワードは英数字８文字以上１００文字以内にしてください。';
// }
// $password_conf = filter_input(INPUT_POST, 'password_conf');
// if($password !== $password_conf){
//   $err[] = '確認用パスワードと異なっています。';
// }

// if (count($err) === 0) {
//   // ユーザーを登録する処理
//   //  dbconnect

// }

?>





<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <?php if (count($err) > 0) : ?>
    <?php foreach($err as $e) : ?>
      <p><?php echo $e ?></p>
    <?php endforeach ?>
    <p><a href="signup.php">登録画面へ戻る</a></p>
  <?php else : ?>
    <p>ユーザー登録が完了しました。</p>
  <?php endif ?>
</body>



<?php





?>











<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>