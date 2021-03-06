
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="wrapper mylist_create_fin">
    

    <h2 class="page_title"><?= $page_title ?></h2>
    <table class="input">
      <?php foreach($mylist as $value): ?>
        <tr>
          <th>サービス名：</th>
          <td><?= $value['name'] ?></td>
        </tr>
        <tr>
          <th>ジャンル：</th>
          <td><?= GENRE[$value['genre']] ?></td>
        </tr>
        <tr>
          <th>支払い種別：</th>
          <td><?= PAYMENT_TYPE[$value['payment_type']] ?></td>
        </tr>
        <tr>
          <th>金額：</th>
          <td><?= $value['monthly_fee'] ?>円</td>
        </tr>
        <tr>
          <th>支払い日：</th>
          <td>
            <?= substr($value['payment_date'], 5, 2) ?>月
            <?= substr($value['payment_date'], 8, 2) ?>日
          </td>
        </tr>
        <tr>
          <th>支払い方法：</th>
          <td><?= PAYMENT_METHOD[$value['payment_method']] ?></td>
        </tr>
        <tr>
          <th>備考：</th>
          <td><?= $value['note'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
    
    <h2>上記のデータの登録が完了しました。</h2>
    <div class="mylist_create_fin_comp">
      <h3><a href="/mypage"> マイページへ</a></h3>
      <h3><a href="/mypage/mylist/create">更に登録する</a></h3>
    </div>
  </div>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>