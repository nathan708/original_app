
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <h2>パスワード再設定</h2>
  <p>
    登録しているメールアドレスを入力してください。<br>
    ご登録いただいているメールアドレスに仮パスワードを記載したメールを送信します。
  </p>

<!-- どこに送るのか -->
  <form action="" method="POST">
    <label for="">メールアドレス</label>
    <input type="email" name="email" value=""><br><br>
    <input type="submit" name="submit" value="送信">
  </form>
  <p>新規登録は<a href="signup.php"> こちらから </a>お願いします。</p>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>