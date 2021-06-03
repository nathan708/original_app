<?php 
// ※セッションでログインしたままにして、マイページへ移動する必要がある。
?>


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <table>
      <tr>
        <th>サービス名</th>
        <td>Netflix(DBから読み込む)</td>
      </tr>
      <tr>
        <th>金額</th>
        <td>Netflix(DBから読み込む)</td>
      </tr>
      <tr>
        <th>サービス名</th>
        <td>800(DBから読み込む)円</td>
      </tr>
      <tr>
        <th>支払い種別</th>
        <td>月額(DBから読み込む)</td>
      </tr>
      <tr>
        <th>ジャンル</th>
        <td>動画(DBから読み込む)</td>
      </tr>
      <tr>
        <th>支払い方法</th>
        <td>クレジットカード(DBから読み込む)</td>
      </tr>
      <tr>
        <th>備考</th>
        <td>~~~(DBから読み込む)</td>
      </tr>
    </table>
  <h2>上記のデータの登録が完了しました。</h2>
  <h2><a href="mypage.php"> マイページへ</a></h2>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>