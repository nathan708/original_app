

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="main">
  <form action="" method="POST">
    <!-- ※ユーザー情報をデータベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->
  <h2><?=$page_title?></h2>
    <table>
      <?php foreach($user as $value): ?>
      <tr>
        <th>ユーザー名</th>
        <td><?= $value['name'] ?></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td><?= $value['address'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <p>上記のユーザ情報を削除します。よろしいですか？</p>
    <input type="submit" name="delete" value="削除">
  </form>

      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>
