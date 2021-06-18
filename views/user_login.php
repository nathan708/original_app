<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
    <h2>ログインフォーム</h2>
    <p>メールアドレスとパスワードを入力してください</p>

    <form action="" method="POST"
        <p>
            <label for="address">メールアドレス： </label>
            <input type="email" name="address" size="35" maxlength="255" value="<?php echo h($_POST['address']);?>"><br>

        </p>
        <p>
            <label for="password"> パスワード　　： </label>
            <input type="text" name="password" size="10" maxlength="20" value="<?php echo h($_POST['password']);?>"><br>
            
            
        </p>
        <p>
        <!-- エラーメッセージ -->
            <?php if ($error['login'] === 'blank'): ?>
            <p class="error"><?= ERROR_MEASSAGE['BLANK']?></p>
            <?php endif; ?>
            <?php if ($error['login'] === 'failed'): ?>
            <p class="error"><?= ERROR_MEASSAGE['LOGIN_FAILED']?></p>
            <?php endif; ?>

        </p>



        <input type="submit" name="login" value="ログイン">
    </form>
    <p>新規登録は<a href="/create">　こちらから　</a>お願いします。</p>
    <br>
    <br>
    <p><a href="/pass_form">パスワードを忘れた方はこちら</a></p>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>