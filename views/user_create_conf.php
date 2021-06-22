<html lang="ja">

<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body class="wrapper">
  
  <h2><?=$page_title?></h2>
  <p>記入した内容を確認して、「登録」ボタンをクリックしてください。</p>
  
  <form class="create_conf" action="create/fin" method="POST" value='submit'>
    <table class="input">
      <tr>
        <th>
          <label for="">ユーザー名：</label>
        </th>
        <td>
          <?php echo h($_POST['name']);?>
        </td>
      </tr>
      <tr>
        <th>
          <label for="">メールアドレス：</label>
        </th>
        <td>
          <?php echo h($_POST['address']);?>
        </td>
        </tr>
      <tr>
        <th>
          <label for="">パスワード：</label>
        </th>
        <td>
          表示されません
        </td>      
      </tr>
      
    <!-- HiddenでPost送信 -->
      <input type="hidden" name="name" value="<?=h($_POST['name'])?>">
      <input type="hidden" name="address" value="<?=h($_POST['address'])?>">
      <input type="hidden" name="password" value="<?=h($_POST['password'])?>">
      <input type="hidden" name="one_token" value="<?= h($_POST['one_token'])?>">
    </table>
    <input class="regist" type="submit" name="create" value="登録する" /></div>
  </form>
  <form action="" method="POST">
      <input type="hidden" name="name" value="<?=h($_POST['name'])?>">
      <input type="hidden" name="address" value="<?=h($_POST['address'])?>">
      <input type="hidden" name="password" value="<?=h($_POST['password'])?>">
      <input type="hidden" name="one_token" value="<?= h($_POST['one_token'])?>">
      <input class="rewrite"  type="submit" name="rewrite" value="書き直し">
  </form>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>