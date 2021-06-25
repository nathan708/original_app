

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="wrapper">
    <h2><?= h($user['name']); ?>さんのサブスク</h2>  
    <div class="mypage_layout">
      <div class="aside">
        <h3>割合</h3>
        <div class="percent">box</div>
        <h3><?php echo date('n') . "月"?>は</h3>
        <h2 class="amount">
          <!-- データベースから総額を引っ張ってくる -->
          <?= $sum ?>
        </h2>
        <h2>円</h2>
      </div>
      <div class="main">
      <h3><?php echo date('n') . "月"?>の支払い一覧</h3>
      <!-- ※データベースから引っ張りたい -->
      <!-- コレ自体もforeachで一括でできるはず -->
      <table class="service_list_index">
        <tr>
          <th>サービス名</th>
          <th>ジャンル</th>
          <th>支払い種別</th>
          <th>金額</th>
          <th>支払い（登録）月日</th>
          <th>支払い方法</th>
          <th>備考</th>
        </tr>
        <?php if(!is_null($services)): ?>
          <?php foreach($services as $service):  ?>
            <tr>
              <td><?= $service['name'] ?></td>
              <td><?= GENRE[$service['genre']] ?></td>
              <td><?= PAYMENT_TYPE[$service['payment_type']] ?></td>
              <td><?= $service['monthly_fee'] ?>円</td>
              <td>
                  <?= substr($service['payment_date'], 5, 2) ?>月
                  <?= substr($service['payment_date'], 8, 2) ?>日
              </td>
              <td><?= PAYMENT_METHOD[$service['payment_method']] ?></td>
              <td><?= $service['note'] ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="7">何も登録されていません</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
</div>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>