

<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="main">
  <form action="" method="POST">
    <!-- ※ユーザー情報をデータベースから引っ張りたい -->
    <!-- コレ自体もforeachで一括でできるはず -->
  <h2><?=$page_title?></h2>
    <table class="input">
      <tr>
          <th>
              <label for="password"> 新しいパスワード： </label>
          </th>
          <td>
              <input type="password" name="password" size="10" maxlength="20" value="<?php echo h($_POST['password']);?>"><br>
          </td>
          <td>
              <?php if ($error['password'] === 'length'): ?>
                  <p class="error"><?= ERROR_MEASSAGE['LENGTH'] ?></p>
              <?php endif; ?>
          </td>
      </tr>

      <tr>
          <th>
              <label for="password_conf"> 新しいパスワード確認： </label>
          </th>
          <td>
              <input type="password" name="password_conf" size="10" maxlength="20" value="<?php echo h($_POST['password_conf']);?>"><br>
          </td>
          <td>
              <?php if ($error['password_conf'] === 'length'): ?>
                  <p class="error"><?= ERROR_MEASSAGE['LENGTH'] ?></p>
              <?php endif; ?>
              <?php if ($error['password_conf'] === 'wrong'): ?>
                  <p class="error"><?= ERROR_MEASSAGE['WRONG'] ?></p>
              <?php endif; ?>
          </td>
    </tr>
    <tr>
        <th></th>
        <td><p class="error"><?= $validation_msg ?></p></td>
    </tr>
 
    </table>
    <p>よろしければ、登録を押してください</p>
    <input type="submit" name="user_change_conf" value="登録">
  </form>
      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>
