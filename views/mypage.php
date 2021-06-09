
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header2.php'); ?>
<body>
  <h2>〇〇<!--db接続をしておく $member['name']-->さんのサブスク</h2>         
  <div class="mypage_layout">
    <div class="aside">
      <h3>割合</h3>
      <div class="percent">box</div>
  <h3><?php echo date('n') . "月"?>は</h3>
  <h2 class="amount">
    <!-- データベースから総額を引っ張ってくる -->
    13000
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
        <th>金額</th>
        <th>支払日</th>
        <th>ジャンル</th>
        <th>支払い方法</th>
        <th>備考</th>
      </tr>
      <tr>
        <!-- データベースから引っ張りたい -->
        <td>Netflix $user['name']</td>
        <td>800円 $user['pay']</td>
        <td>5月15日 $user['payment_date']</td>
        <td>動画 $user['genre']</td>
        <td>クレジットカード['payment_method']</td>
        <td>なし $user['note']</td>
      </tr>
      <tr>
        <!-- データベースから引っ張りたい -->
        <td>Amazon Prime</td>
        <td>3600円</td>
        <td>5月20日</td>
        <td>動画</td>
        <td>クレジットカード</td>
        <td>年会費</td>
      </tr>
      <tr>
        <!-- データベースから引っ張りたい -->
        <td>スポーツジム</td>
        <td>6000円</td>
        <td>5月25日</td>
        <td>動画</td>
        <td>三井住友銀行</td>
        <td>4月に更新費6000円</td>
      </tr>
      <tr>
        <!-- データベースから引っ張りたい -->
        <td>Netflix</td>
        <td>800円</td>
        <td>5月15日</td>
        <td>動画</td>
        <td>クレジットカード</td>
        <td>なし</td>
      </tr>
      <tr>
        <!-- データベースから引っ張りたい -->
        <td>Netflix</td>
        <td>800円</td>
        <td>5月15日</td>
        <td>動画</td>
        <td>クレジットカード</td>
        <td>なし</td>
      </tr>
      <tr>
        <!-- データベースから引っ張りたい -->
        <td>Netflix</td>
        <td>800円</td>
        <td>5月15日</td>
        <td>動画</td>
        <td>クレジットカード</td>
        <td>なし</td>
      </tr>

    
    </table>
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>