


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <h2><?=$page_title?></h2>
  <p>ご意見、ご感想やお問い合わせはこちらからお願いいたします。</p>

  <form action="" method="POST">
    <p>
        <label for="">お名前　　　　： </label>
        <input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['email']), ENT_QUOTES);?>"><br>
    
        <?php if ($error['name'] === 'blank'): ?>
        <p class="error">お名前を入力してください。</p>
        <?php endif; ?>
    </p>
    <p>
        <label for="">メールアドレス： </label>
        <input type="email" name="email" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['email']), ENT_QUOTES);?>"><br>
    
        <?php if ($error['email'] === 'blank'): ?>
        <p class="error">Emailを入力してください。</p>
        <?php endif; ?>
    </p>
    <p>
        <label for="">お問い合わせ内容： <br></label>
        <textarea name="kanso"  cols="60" rows="10"></textarea>
    
        <?php if ($error['kanso'] === 'blank'): ?>
        <p class="error">お問合わせ内容を入力してください。</p>
        <?php endif; ?>
    </p>
    <input type="submit" name="send" value="送信">
  </form>

<h3><a href="/delete">退会を希望される方はこちら</a></h3>


</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>