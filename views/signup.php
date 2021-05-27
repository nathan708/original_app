






<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<div class="register_layout wrapper">
    <div class="register_form">
        <form action="" method="POST">
            <p>
                <label for="username">ユーザー名　　：</label>
                <input type="text" name="username" value="<?php echo $_POST?>"><br>
            </p>
            <p>
                <label for="email">メールアドレス： </label>
                <input type="email" name="email" value=""><br>
            </p>
            <p>
                <label for="password"> パスワード　　： </label>
                <input type="text" name="password" value=""><br>
            </p>
            <p>
                <label for="password_conf"> パスワード確認： </label>
                <input type="text" name="password_conf" value=""><br>
            </p>

            <input type="submit" name="submit" value="新規登録"><br>
        </form>
        既に登録済みの方はこちらから <a href="login.php">ログイン</a> してください。
    </div>

    <div class="register_right">


    </div>

</div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>