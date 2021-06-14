


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header2.php'); ?>
<body>

  <div class="mypage_layout">
 
  <div class="main">
    <!-- ※データベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->
    <table class="service_list">
      <tr>
        <th>サービス名</th>
        <th>ジャンル</th>
        <th>支払い種別</th>
        <th>金額</th>
        <th>支払い日</th>
        <th>支払い方法</th>
        <th>備考</th>

      </tr>
        <!-- データベースから引ってくる -->
        <?php if(!is_null($myservices)): ?>
          <?php foreach($myservices as $myservice): ?>
            <tr>
              <td><?= $myservice['name'] ?></td>
              <td><?= GENRE[$myservice['genre']] ?></td>
              <td><?= PAYMENT_TYPE[$myservice['payment_type']] ?></td>
              <td><?= $myservice['monthly_fee'] ?>円</td>
              <!-- 毎月とか毎年とかにしたい -->
              <td><?= $myservice['payment_date'] ?></td>
              <td><?= PAYMENT_METHOD[$myservice['payment_method']] ?></td>
              <td><?= $myservice['note'] ?></td>
              <td>
                <a href="/mypage/mylist/edit?id=<?= $myservice['id'] ?>">編集</a>
                <p>／</p>
                <a href="/mypage/mylist/delete?id=<?= $myservice['id'] ?>">削除</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
            <tr>
              <td colspan="4"></td>
            </tr>
        <?php endif; ?>
      <tr>

    
    </table>
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>