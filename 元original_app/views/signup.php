<?php
// ※付きは課題
// ※アカウントを重複しないようにするには
session_start();
// エラーチェック
if (!empty($_POST)){
    
    if (empty($_POST['name'])){
        $error['name'] = 'blank';
    }
    if (empty($_POST['email'])){
        $error['email'] = 'blank';
    }
    if (strlen($_POST['password']) < 4 ){
        $error['password'] = 'length';
    }
    if (empty($_POST['password'])){
        $error['password'] = 'blank';
    }
    if (empty($_POST['password_conf'])){
        $error['password_conf'] = 'blank';
    }elseif ($_POST['password_conf'] !== $_POST['password']){
        $error['password_conf'] = 'wrong';
    }
// エラーが無ければ次に進む
    if (empty($error)){
        $_SESSION['join'] = $_POST;
        header('Location: signup_conf.php');
        exit();
    }
}
// ※書き直し
if ($_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])){
    $_POST = $_SESSION['join'];
}
var_dump($_SESSION['signup']);
?>


<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
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

            <input type="submit" name="submit" value="新規登録"><br>
        </form>
        既に登録済みの方はこちらから <a href="login.php">ログイン</a> してください。
    </div>

    <div class="register_right">


    </div>

</div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>