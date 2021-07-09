
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="content">

  <h2><?=$page_title?></h2>
  <p>記入した内容を確認して、「登録」ボタンをクリックしてください。</p>
  
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
  </table>
    
    <!-- HiddenでPost送信 -->
    <div class="create_conf">
      <ul>
        <form class="rewrite" action="" method="POST">
          <input type="hidden" name="name" value="<?=h($_POST['name'])?>">
          <input type="hidden" name="address" value="<?=h($_POST['address'])?>">
          <input type="hidden" name="password" value="<?=h($_POST['password'])?>">
          <input type="hidden" name="password_conf" value="<?=h($_POST['password_conf'])?>">
          <input type="hidden" name="one_token" value="<?= h($_POST['one_token'])?>">
          <li>
            <input class="rewrite"  type="submit" name="rewrite" value="書き直し">
          </li>
        </form>

        <form class="regist" action="create/fin" method="POST" value='submit'>
        <input type="hidden" name="name" value="<?=h($_POST['name'])?>">
        <input type="hidden" name="address" value="<?=h($_POST['address'])?>">
        <input type="hidden" name="password" value="<?=h($_POST['password'])?>">
        <input type="hidden" name="one_token" value="<?= h($_POST['one_token'])?>">
        <li>
          <input class="regist" type="submit" name="create" value="登録する" />
        </li>
      </form>
    </ul>
    </div>
  </div>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>