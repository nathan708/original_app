<!-- ヘッダーをページごとに変更するには？ -->
<?php 
if (!empty($_POST)) {
  header('Location: mylist_delete_fin.php');
}
?>

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
 
  <div class="main">
  <form action="" method="POST">
    <!-- ※データベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->

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
    <p>上記のユーザ情報を削除します。よろしいですか？</p>
    <input type="submit" name="delete" value="削除">
  </form>

      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>