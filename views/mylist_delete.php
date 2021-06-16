<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
 
  <div class="main">
  <form action="/mypage/mylist/delete/fin" method="POST">
    <!-- ※データベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->

    <table>
    <?php foreach($service as $value): ?>
      <tr>
        <th>サービス名</th>
        <td><?= h($value['name'])?></td>
      </tr>
      <tr>
        <th>ジャンル</th>
        <td><?= h(GENRE[$value['genre']])?></td>
      </tr>
        <th>支払い種別</th>
          <td><?= h(PAYMENT_TYPE[$value['payment_type']])?></td>
      </tr>
      <tr>
        <th>金額</th>
        <td><?= h($value['monthly_fee'])?>円</td>
      </tr>
      <tr>
      <tr>
        <th>支払い日</th>
        <td>
          <?= substr($value['payment_date'], 5, 2) ?>月
          <?= substr($value['payment_date'], 8, 2) ?>日
        </td>
      </tr>
      <tr>
        <th>支払い方法</th>
        <td><?= h(PAYMENT_METHOD[$value['payment_method']])?></td>
      </tr>
      <tr>
        <th>備考</th>
        <td><?= h($value['note'])?></td>
      </tr>
    <?php endforeach; ?>
    </table>
  

    <p>上記のユーザ情報を削除します。よろしいですか？</p>
    <input type="submit" name="delete" value="削除">

      <input type="hidden" name="name" value="<?= $value['name']?>">
      <input type="hidden" name="genre" value="<?= $value['genre']?>">
      <input type="hidden" name="payment_type" value="<?= $value['payment_type']?>">
      <input type="hidden" name="monthly_fee" value="<?= $value['monthly_fee']?>">
      <input type="hidden" name="payment_date" value="<?= $value['payment_date']?>">
      <input type="hidden" name="payment_method" value="<?= $value['payment_method']?>">
      <input type="hidden" name="note" value="<?= $value['note']?>">
      <input type="hidden" name="service_id" value="<?= $_POST['service_id']?>">

      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>