
<html lang="ja">
  <?php require_once(dirname(__FILE__).'/head.php'); ?>
<body>
  <?php require_once(dirname(__FILE__).'/header.php'); ?>
  <main>
    <table>
    <?php foreach($user as $value): ?>
    <tr>
      <th>ユーザーネーム</th>
      <td><?= $value['name'] ?></td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><?= $value['address'] ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
  </main>


  <h2>上記ユーザーの登録が完了しました。</h2>
  <h2><a href="/login"> ログインページへ</a></h2>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>