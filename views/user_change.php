

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
      <?php foreach($user as $value): ?>
      <tr>
        <th>現在のユーザー名：</th>
        <td><?= $value['name'] ?></td>
      </tr>
      <tr>
        <th>新しいユーザー名：</th>
        <td>
          <input type="text" name="name" size="40" maxlength="255" placeholder="変更しない場合は何も入力しないでください" value="<?php if (!empty($_POST['name'])) {echo h($_POST['name']);}?>">
        </td>
      </tr>
      <tr>
        <th>現在のメールアドレス：</th>
        <td><?= $value['address'] ?></td>
      </tr>
      <tr>
        <th>新しいメールアドレス：</th>
        <td>
          <input type="email" name="address" size="40" maxlength="255" placeholder="変更しない場合は何も入力しないでください" value="<?php if (!empty($_POST)) { echo h($_POST['address']);}?>">
        </td>
        <td>
            <?php if (!empty($error) && $error['address'] === 'duplicate'): ?>
                <p class="error"><?= ERROR_MEASSAGE['DUPLICATE'] ?></p>
            <?php endif; ?>
        </td>
      </tr>
 
      <?php endforeach; ?>
    </table>
    <p>よろしければ、確認を押してください</p>
    <input type="submit" name="user_change_conf" value="確認">
  </form>
      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>
