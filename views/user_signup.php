

<?php require_once(dirname(__FILE__).'/../views/head.php'); ?>
<?php require_once(dirname(__FILE__).'/../views/header.php'); ?>
<div class="signup_layout wrapper">
    <div class="signup_form">
        <h2><?=$page_title?></h2>
        <form action="" method="POST">
            <p>
                <label for="username">ユーザー名　　：</label>
                <input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['name']), ENT_QUOTES);?>"><br>
            </p>

            <p>
                <label for="email">メールアドレス： </label>
                <input type="email" name="address" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['address']), ENT_QUOTES);?>"><br>
                
                <?php if ($error['address'] === 'duplicate'): ?>
                <p class="error"><?= ERROR_MEASSAGE['duplicate']?></p>
                <?php endif; ?>
            </p>
            <p>
                <label for="password"> パスワード　　： </label>
                <input type="text" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars(($_POST['password']), ENT_QUOTES);?>"><br>
                <?php if ($error['password'] === 'length'): ?>
                <p class="error"><?= ERROR_MEASSAGE['length'] ?></p>
                <?php endif; ?>
            </p>
            <p>
                <label for="password_conf"> パスワード確認： </label>
                <input type="text" name="password_conf" size="10" maxlength="20" value="<?php echo htmlspecialchars(($_POST['password_conf']), ENT_QUOTES);?>"><br>
                <?php if ($error['password_conf'] === 'length'): ?>
                <p class="error"><?= ERROR_MEASSAGE['length'] ?></p>
                <?php endif; ?>
                <?php if ($error['password_conf'] === 'wrong'): ?>
                <p class="error"><?= ERROR_MEASSAGE['wrong'] ?></p>
                <?php endif; ?>
                
            </p>
            <p class="error"><?= $validation_msg ?></p>
            <input type="submit" name="send" value="新規登録"><br>
        </form>
        既に登録済みの方はこちらから <a href="/login">ログイン</a> してください。
    </div>
    <div class="register_right">


    </div>

</div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>