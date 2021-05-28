<?php
session_start();

// sessionの中身をまず確認  うまく処理できていない
if (!isset($_SESSION['join'])){
    header('Locaiton: signup.php');
    exit();
}

?>

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <p>記入した内容を確認して、「登録」ボタンをクリックしてください。</p>
  <form action="" method="POST" value='submit'>
    <dl>
      <dt>ニックネーム</dt>
      <dd>
        <?php echo htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES);?>
      </dd>
      <dt>メールアドレス</dt>
      <dd>
        <?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES);?>
      </dd>
      <dt>パスワード</dt>
      <dd>
        表示されません
      </dd>
    </dl>
    <a href="signup.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
  </form>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>