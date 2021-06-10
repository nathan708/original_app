<html lang="ja">
<?php var_dump($_POST); ?>

<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <p>記入した内容を確認して、「登録」ボタンをクリックしてください。</p>
  <form action="signup/fin" method="POST" value='submit'>
      <p>
        <label for="">ユーザーネーム：</label>
        <?php echo htmlspecialchars($_POST['name'],ENT_QUOTES);?>
      </p>
      <p>
        <label for="">メールアドレス：</label>
        <?php echo htmlspecialchars($_POST['address'],ENT_QUOTES);?>
        </p>
      <p>
        <label for="">パスワード：</label>
        <?php echo htmlspecialchars($_POST['password'],ENT_QUOTES);?>
      </p>
      
    <!-- HiddenでPost送信 -->
      <input type="hidden" name="name" value="<?=htmlspecialchars($_POST['name'],ENT_QUOTES)?>">
      <input type="hidden" name="address" value="<?=htmlspecialchars($_POST['address'],ENT_QUOTES)?>">
      <input type="hidden" name="password" value="<?=htmlspecialchars($_POST['name'],ENT_QUOTES)?>">

      <a href="/signup?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" name="regist" value="登録する" /></div>
  </form>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>