<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
    <h2><?= $page_title ?></h2>
    <p>メールアドレスとパスワードを入力してください</p>

    <form action="" method="POST">
        <table class="input">
            <tr>
                <th>
                    <label for="address">メールアドレス： </label>
                </th>
                <td>
                    <input type="email" name="address" size="35" maxlength="255" value="<?php echo h($_POST['address']);?>"><br>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="password"> パスワード： </label>
                </th>
                <td>
                    <input type="password" name="password" size="10" maxlength="20" value="<?php echo h($_POST['password']);?>"><br>
                </td>
            </tr>
            <tr>
                <th></th>
                <!-- エラーメッセージ -->
                <td>
                    <?php if ($error['login'] === 'blank'): ?>
                    <p class="error"><?= ERROR_MEASSAGE['BLANK']?></p>
                    <?php endif; ?>
                    <?php if ($error['login'] === 'failed'): ?>
                    <p class="error"><?= ERROR_MEASSAGE['LOGIN_FAILED']?></p>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="login" value="ログイン">
    </form>
    
    <p>新規登録は<a href="/create">　こちらから　</a>お願いします。</p>
    <br>
    <br>
    <p><a href="/pass_form">パスワードを忘れた方はこちら</a></p>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>