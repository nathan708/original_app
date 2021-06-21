
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <h2><?= $page_title ?></h2>
  <table class="input">
    <?php foreach($user as $value): ?>
      <tr>
        <th>ユーザー名：</th>
        <td><?= $value['name'] ?></td>
      </tr>
      <tr>
        <th>メールアドレス：</th>
        <td><?= $value['address'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <h2>上記のデータの登録が完了しました。</h2>
  <h2><a href="/mypage"> マイページへ</a></h2>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>