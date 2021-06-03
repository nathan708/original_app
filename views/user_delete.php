<!-- ヘッダーをページごとに変更するには？ -->
<?php 
if (!empty($_POST)) {
  header('Location: user_delete_fin.php');
}
?>

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
 
  <div class="main">
  <form action="" method="POST">
    <!-- ※ユーザー情報をデータベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->

    <table>
      <tr>
        <th>ユーザー名</th>
        <td>naoya(DBから読み込む)</td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>fuga@...(DBから読み込む)</td>
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
