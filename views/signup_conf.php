<?php
// session_start();
// // ※データベースに接続したら 完了画面に遷移したい

// //中身が無ければもとに戻す
// if (!isset($_SESSION['join'])) {
//   header('Location: signup.php');
//   exit();
// }

// // ※登録するが押されたらデータベースに接続して、データベースに挿入する
// if (!empty($_POST)) {

//   unset($_SESSION['join']);
//   header('Location:signup_fin.php');
//   exit();
  
// }

?>

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <p>記入した内容を確認して、「登録」ボタンをクリックしてください。</p>
  <form action="signup/conf" method="POST" value='submit'>
    <input type="hidden" name="action" value="submit">
      <p>
        <label for="">ニックネーム：</label>
        <?php echo htmlspecialchars($_SESSION['signup']['name'],ENT_QUOTES);?>
      </p>
      <p>
        <label for="">メールアドレス：</label>
        <?php echo htmlspecialchars($_SESSION['signup']['email'],ENT_QUOTES);?>
        </p>
      <p>
        <label for="">パスワード：</label>
        表示されません
      </p>
      <a href="/signup?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" name="regist" value="登録する" /></div>
  </form>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>