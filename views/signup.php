<?php
if (empty($_POST['username'])){
    $error['username'] = 'blank';
}
if (empty($_POST['email'])){
    $error['email'] = 'blank';
}
if (empty($_POST['password'])){
    $error['password'] = 'blank';
}
if (empty($_POST['password_conf'])){
    $error['password_conf'] = 'blank';
}elseif ($_POST['password_conf'] !== $_POST['password']){
    $error['password_conf'] = 'wrong';
}
?>

今後の方針
ページを開くといきなりエラーメッセージが出てしまう
登録後どのようにしていくか



<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<div class="register_layout wrapper">
    <div class="register_form">
        <form action="" method="POST">
            <p>
                <label for="username">ユーザー名　　：</label>
                <input type="text" name="username" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['username']), ENT_QUOTES);?>"> <br>
                <?php if ($error['username'] === 'blank'): ?>
                <p>ユーザーネームを入力してください。</p>
                <?php endif; ?>
            </p>

            <p>
                <label for="email">メールアドレス： </label>
                <input type="email" name="email" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['email']), ENT_QUOTES);?>"><br>
                <?php if ($error['email'] === 'blank'): ?>
                <p>Emailを入力してください。</p>
                <?php endif; ?>
            </p>
            <p>
                <label for="password"> パスワード　　： </label>
                <input type="text" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars(($_POST['password']), ENT_QUOTES);?>"><br>
                <?php if ($error['password'] === 'blank'): ?>
                <p>パスワードを入力してください。</p>
                <?php endif; ?>
            </p>
            <p>
                <label for="password_conf"> パスワード確認： </label>
                <input type="text" name="password_conf" size="10" maxlength="20" value="<?php echo htmlspecialchars(($_POST['password']), ENT_QUOTES);?>"><br>
                <?php if ($error['password_conf'] === 'blank'): ?>
                <p>確認用のパスワードを入力してください。</p>
                <?php elseif ($error['password_conf'] === 'wrong'): ?>
                <p>同じパスワードを入力してください。</p>
                <?php endif; ?>
            </p>

            <input type="submit" name="submit" value="新規登録"><br>
        </form>
        既に登録済みの方はこちらから <a href="login.php">ログイン</a> してください。
    </div>

    <div class="register_right">


    </div>

</div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>