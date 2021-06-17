<html lang="ja">

<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <p>記入した内容を確認して、「登録」ボタンをクリックしてください。</p>
  <form action="create/fin" method="POST" value='submit'>
      <p>
        <label for="">ユーザーネーム：</label>
        <?php echo h($_POST['name']);?>
      </p>
      <p>
        <label for="">メールアドレス：</label>
        <?php echo h($_POST['address']);?>
        </p>
      <p>
        <label for="">パスワード：</label>
        表示されません
      </p>
      
    <!-- HiddenでPost送信 -->
      <input type="hidden" name="name" value="<?=h($_POST['name'])?>">
      <input type="hidden" name="address" value="<?=h($_POST['address'])?>">
      <input type="hidden" name="password" value="<?=h($_POST['password'])?>">
      <input type="hidden" name="one_token" value="<?= h($_POST['one_token'])?>">

    <input type="submit" name="create" value="登録する" /></div>
  </form>
  <form action="" method="POST">
      <input type="hidden" name="name" value="<?=h($_POST['name'])?>">
      <input type="hidden" name="address" value="<?=h($_POST['address'])?>">
      <input type="hidden" name="password" value="<?=h($_POST['password'])?>">
      <input type="hidden" name="one_token" value="<?= h($_POST['one_token'])?>">

      <input type="submit" name="rewrite" value="書き直し">
  </form>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>