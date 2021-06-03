<?php 
// ※セッションでログインしたままにして、マイページへ移動する必要がある。
?>


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
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
  <h2>上記のデータの削除が完了しました。</h2>
  <h2><a href="/"> トップページへ</a></h2>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>