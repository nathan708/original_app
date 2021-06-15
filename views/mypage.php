
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <h2><?= htmlspecialchars($user['name'], ENT_QUOTES); ?>さんのサブスク</h2>         
  <div class="mypage_layout">
    <div class="aside">
      <h3>割合</h3>
      <div class="percent">box</div>
  <h3><?php echo date('n') . "月"?>は</h3>
  <h2 class="amount">
    <!-- データベースから総額を引っ張ってくる -->

<?php foreach($amount as $value): ?>
<?= $value[0] ?>
<?php endforeach; ?>


    
  </h2>
  <h2>円</h2>
    
  </div>
  <div class="main">
    <h3><?php echo date('n') . "月"?>の支払い一覧</h3>
    <!-- ※データベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->
    <table class="service_list">
      <tr>
        <th>サービス名</th>
        <th>ジャンル</th>
        <th>金額</th>
        <th>支払い日</th>
        <th>支払い方法</th>
        <th>備考</th>
      </tr>
    <?php if(!is_null($services)): ?>
      <?php foreach($services as $service):  ?>
        <tr>
          <td><?= $service['name'] ?></td>
          <td><?= GENRE[$service['genre']] ?></td>
          <td><?= $service['monthly_fee'] ?>円</td>
          <td><?= $service['payment_date'] ?></td>
          <td><?= PAYMENT_METHOD[$service['payment_method']] ?></td>
          <td><?= $service['note'] ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
      <td colspan="4"></td>
      </tr>
    <?php endif; ?>
    
    </table>
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>