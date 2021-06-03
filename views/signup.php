
<?php require_once(dirname(__FILE__).'/../views/head.php'); ?>
<?php require_once(dirname(__FILE__).'/../views/header.php'); ?>
<div class="signup_layout wrapper">
    <div class="signup_form">
        <form action="" method="POST">
            <p>
                <label for="username">ユーザー名　　：</label>
                <input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['name']), ENT_QUOTES);?>"> <br>
                <?php if ($error['name'] === 'blank'): ?>
                <p class="error">ユーザーネームを入力してください。</p>
                <?php endif; ?>
            </p>

            <p>
                <label for="email">メールアドレス： </label>
                <input type="email" name="email" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['email']), ENT_QUOTES);?>"><br>
                <?php if ($error['email'] === 'blank'): ?>
                <p class="error">Emailを入力してください。</p>
                <?php endif; ?>
            </p>
            <p>
                <label for="password"> パスワード　　： </label>
                <input type="text" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars(($_POST['password']), ENT_QUOTES);?>"><br>
                <?php if ($error['password'] === 'length'): ?>
                <p>パスワードを４文字以上で入力してください。</p>
                <?php endif; ?>
                <?php if ($error['password'] === 'blank'): ?>
                <p class="error">パスワードを入力してください。</p>
                <?php endif; ?>
            </p>
            <p>
                <label for="password_conf"> パスワード確認： </label>
                <input type="text" name="password_conf" size="10" maxlength="20" value="<?php echo htmlspecialchars(($_POST['password_conf']), ENT_QUOTES);?>"><br>
                <?php if ($error['password_conf'] === 'blank'): ?>
                <p class="error">確認用のパスワードを入力してください。</p>
                <?php elseif ($error['password_conf'] === 'wrong'): ?>
                <p class="error">同じパスワードを入力してください。</p>
                <?php endif; ?>
            </p>

            <input type="submit" name="send" value="新規登録"><br>
        </form>
        既に登録済みの方はこちらから <a href="login.php">ログイン</a> してください。
    </div>
    <div class="register_right">


    </div>

</div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>