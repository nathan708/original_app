
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="main">

    <h2><?= $page_title ?></h2> 
    <table class="input">
        <tr>
          <th>サービス名：</th>
          <td><?= h($_POST['name']) ?></td>

        </tr>
        <tr>
          <th>ジャンル：</th>
          <td><?= h(GENRE[$_POST['genre']]) ?></td>
        </tr>
        <tr>
          <th>支払い種別：</th>
          <td><?= h(PAYMENT_TYPE[$_POST['payment_type']]) ?></td>
        </tr>
        <tr>
          <th>金額：</th>
          <td><?= h($_POST['monthly_fee'])?>円</td>
        </tr>
        <tr>
          <th>支払い日：</th>
          <td>
            <?= substr($_POST['payment_date'], 5, 2) ?>月
            <?= substr($_POST['payment_date'], 8, 2) ?>日
          </td>
        </tr>
        <tr>
          <th>支払い方法：</th>
          <td><?= h(PAYMENT_METHOD[$_POST['payment_method']]) ?></td>
        </tr>
        <tr>
          <th>備考：</th>
          <td><?= h($_POST['note']) ?></td>
        </tr>
      </table>
    <h2>上記のデータの削除が完了しました。</h2>
    <h2><a href="/mypage"> マイページへ</a></h2>
  </div>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>