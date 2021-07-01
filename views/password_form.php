<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <h2><?=$page_title?></h2>
  <p>
    登録しているメールアドレスを入力してください。<br>
    ご登録いただいているメールアドレスに仮パスワードを記載したメールを送信します。
  </p>

<!-- どこに送るのか -->
  <form action="" method="POST">
    <label for="">メールアドレス：</label>
    <input type="email" name="address" value=""><br><br>
    <p class="error"><?php if (!empty($error)) {echo $error_msg;} ?></p>
    <input type="submit" name="submit" value="送信">
  </form>
  <p>新規登録は<a href="/create"> 「こちらから」 </a>お願いします。</p>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>