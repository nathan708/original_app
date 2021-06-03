<?php
session_start();
// エラーチェック
// 空の場合
if (!empty($_POST)){
    if (empty($_POST['email'])){
        $error['email'] = 'blank';
    }
    if (empty($_POST['password'])){
        $error['password'] = 'blank';
    }
// DBと合っているかどうか


// ※エラーが無ければ次に進むが どうやってdbと合わせるのか
    if (empty($error)){
        //???? $_SESSION['join'] = $_POST;
        header('Location: mypage.php');
        exit();
    }
}

?>



<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
    <h2>ログインフォーム</h2>
    <p>メールアドレスとパスワードを入力してください</p>

    <form action="" method="POST"
        <p>
            <label for="email">メールアドレス： </label>
            <input type="email" name="email" size="35" maxlength="255" value="<?php echo htmlspecialchars(($_POST['email']), ENT_QUOTES);?>"><br>
        
            <?php if ($error['email'] === 'blank'): ?>
            <p class="error">メールアドレスを入力してください。</p>
            <?php endif; ?>
            <!-- ※dbと一致しているか確認する処理 -->
            <!-- <?php if ($error['email'] === 'blank'): ?>
            <p>正しいメールアドレスとパスワードを入力してください。</p>
            <?php endif; ?> -->
        </p>
        <p>
            <label for="password"> パスワード　　： </label>
            <input type="text" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars(($_POST['password']), ENT_QUOTES);?>"><br>
            
            <!-- ※dbと一致しているか確認する処理 -->
            <?php if ($error['password'] === 'blank'): ?>
            <p class="error">パスワードを入力してください。</p>
            <?php endif; ?>
        </p>
        <input type="submit" name="login" value="ログイン">
    </form>
    <p>新規登録は<a href="signup.php">　こちらから　</a>お願いします。</p>
    <br>
    <br>
    <p><a href="password_form.php">パスワードを忘れた方はこちら</a></p>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>