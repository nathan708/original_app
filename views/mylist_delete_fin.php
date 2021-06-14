
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header2.php'); ?>
<body>
  <table>
      <tr>
        <th>サービス名</th>
        <td><?= $_POST['name'] ?></td>

      </tr>
      <tr>
        <th>ジャンル</th>
        <td><?= GENRE[$_POST['genre']] ?></td>
      </tr>
      <tr>
        <th>支払い種別</th>
        <td><?= PAYMENT_TYPE[$_POST['payment_type']] ?></td>
      </tr>
      <tr>
        <th>金額</th>
        <td><?= $_POST['monthly_fee'] ?>円</td>
      </tr>
      <tr>
        <th>支払い日</th>
        <td><?= $_POST['payment_date'] ?></td>
      </tr>
      <tr>
        <th>支払い方法</th>
        <td><?= PAYMENT_METHOD[$_POST['payment_method']] ?></td>
      </tr>
      <tr>
        <th>備考</th>
        <td><?= $_POST['note'] ?></td>
      </tr>
    </table>
  <h2>上記のデータの削除が完了しました。</h2>
  <h2><a href="/mypage"> マイページへ</a></h2>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>