


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <div class="wrapper">
    <div class="content">

      <h2><?=$page_title?></h2>
      <p>ご意見、ご感想やお問い合わせはこちらからお願いいたします。</p>
      
      <form action="" method="POST">
        
        <table class="input">
          <tr>
            <th>
              <label for="">お名前： </label>
            </th>
            <td>
              <input type="text" name="name" size="35" maxlength="255" value="<?php if (!empty($_POST)) {h($_POST['name']);}?>">
            </td>
            <td>
              <?php if (!empty($error)): ?>
                <p class="error">お名前を入力してください。</p>
                <?php endif; ?>
              </td>
            </tr>
            
            <tr>
              <th>
                <label for="">メールアドレス： </label>
              </th>
              <td>
                <input type="email" name="address" size="35" maxlength="255" value="<?php  if(!empty($_POST)) {echo h($_POST['address']);}?>">
              </td>
              <td>
                <?php if (!empty($error)): ?>
                  <p class="error"><?= ERROR_MEASSAGE['EMAIL']?></p>
                  <?php endif; ?>
                </td>
              </tr>
              <tr>
                <th>
                  <label for="">お問い合わせ内容： <br></label>
                </th>
                <td>
                  <textarea name="description"  cols="60" rows="10" maxlength="600"></textarea>
                </td>
                <td>
                  <?php if (!empty($error['description'])): ?>
                    <p class="error">お問合わせ内容を入力してください。</p>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" name="send" value="送信">
                  </td>
                </tr>
              </table>
            </form>
            
            <h3 class="contact_change"><a href="/contact/change">ユーザー登録情報を変更されたい方はこちら ||</a></h3>
            <h3 class="contact_change"><a href="/contact/change/password">パスワードを変更されたい方はこちら ||</a></h3>
            <h3 class="contact_change"><a href="/delete">退会を希望される方はこちら</a></h3>
    </div>
  </div>
          
          
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>