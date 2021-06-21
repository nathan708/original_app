

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="main">
  <form action="/contact/change/fin" method="POST">
    <!-- ※ユーザー情報をデータベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->
  <h2><?=$page_title?></h2>
    <table class="input">
      <tr>
        <th>ユーザー名：</th>
        <td><?= $_POST['name'] ?></td>
      </tr>
      <tr>
        <th>メールアドレス：</th>
        <td><?= $_POST['address'] ?></td>
      </tr>
    </table>
      <input type="hidden" name="user_id" value="<?= h($_SESSION['id'])?>">
      <input type="hidden" name="name" value="<?= h($_POST['name'])?>">
      <input type="hidden" name="address" value="<?= h($_POST['address'])?>">
    <p>上記のユーザ情報を変更します。よろしいですか？</p>
    <input type="submit" name="user_change" value="変更登録">
  </form>
  <form action="" method="POST">
      <input type="hidden" name="name" value="<?= h($_POST['name'])?>">
      <input type="hidden" name="address" value="<?= h($_POST['address'])?>">


      <!-- ワンタイムトークン確認用 -->
      <!-- <input type="hidden" name="one_token" value="<?= $_POST['one_token'] ?>"> -->

      <input type="submit" name="rewrite" value="書き直す" >
  </form>

      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>
