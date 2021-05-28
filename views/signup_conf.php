<?php
session_start();
// ※データベースに接続したら 完了画面に遷移したい
if (!isset($_SESSION['join'])) {
  header('Location: signup.php');
  exit();
}

?>

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <p>記入した内容を確認して、「登録」ボタンをクリックしてください。</p>
  <form action="" method="POST" value='submit'>
    <input type="hidden" name="action" value="submit">
      <label for="">ニックネーム</label>
        <p><?php echo htmlspecialchars($_SESSION['join']['name'],ENT_QUOTES);?></p>
      <label for="">メールアドレス</label>
        <p><?php echo htmlspecialchars($_SESSION['join']['email'],ENT_QUOTES);?></p>
      <label for="">パスワード</label>
        <p>表示されません</p>
      <a href="signup.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
  </form>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>