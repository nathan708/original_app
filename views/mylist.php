


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="mylist_layout">
    <div class="main">
    <h2 class="page_title"><?= $page_title ?></h2>  
    <!-- ※データベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->
    <table class="service_list_index">
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
              <td>
                  <?= substr($myservice['payment_date'], 5, 2) ?>月
                  <?= substr($myservice['payment_date'], 8, 2) ?>日
              </td>
              <td><?= PAYMENT_METHOD[$myservice['payment_method']] ?></td>
              <td><?= $myservice['note'] ?></td>

            <!-- formタグでPost送信 -->
              <td>
                <form action="/mypage/mylist/edit" method="POST">
                  <input type="hidden" name="service_id" value="<?= $myservice['id'] ?>">
                  <input type="submit" name="edit" value="編集">
                </form>
                <form action="/mypage/mylist/delete" method="POST">
                  <input type="hidden" name="service_id" value="<?= $myservice['id'] ?>">
                  <input type="submit" name="delete" value="削除">
                </form>
              </td>
            </tr>
            <?php endforeach; ?>

            <?php else: ?>
              <tr>
                <td colspan="4">何も登録されていません</td>
              </tr>
            <?php endif; ?>
    </table>

    <!-- ページネーション -->
    <div id="page">
      <?php if($page >=2 ): ?>
        <a href="/mypage/mylist? page=<?= $page - 1 ?>"><?= $page - 1 ?>ページ目へ</a>  ||
      <?php endif; ?>
      <?php if($page < $max_page): ?>
        <a href="/mypage/mylist?page=<?= $page + 1 ?>"><?= $page + 1 ?>ページ目へ</a>
      <?php endif; ?>
    </div>

  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>