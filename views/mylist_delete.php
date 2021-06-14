<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header2.php'); ?>
<body>
 
  <div class="main">
  <form action="" method="POST">
    <!-- ※データベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->

    <table>
    <?php foreach($service as $value): ?>
      <tr>
        <th>サービス名</th>
        <td><?= $value['name']?></td>
      </tr>
      <tr>
        <th>ジャンル</th>
        <td><?= GENRE[$value['genre']]?></td>
      </tr>
        <th>支払い種別</th>
          <td><?= PAYMENT_TYPE[$value['payment_type']]?></td>
      </tr>
      <tr>
        <th>金額</th>
        <td><?= $value['monthly_fee']?>円</td>
      </tr>
      <tr>
      <tr>
        <th>支払い日</th>
        <td><?= $value['payment_date']?></td>
      </tr>
      <tr>
        <th>支払い方法</th>
        <td><?= PAYMENT_METHOD[$value['payment_method']]?></td>
      </tr>
      <tr>
        <th>備考</th>
        <td><?= $value['note']?></td>
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

  </form>

      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>