<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
    <div class="wrapper">
        <div class="user_create_login">
            <h2 class="page_title"><?= $page_title ?></h2>
            <p>メールアドレスとパスワードを入力してください。</p>

            <form action="" method="POST">
                <table class="input">
                    <tr>
                        <th>
                            <label for="address">メールアドレス： </label>
                        </th>
                        <td>
                            <input type="email" name="address" size="35" maxlength="255" value="<?php if(!empty($_POST['address'])) {echo h($_POST['address']);}?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="password"> パスワード： </label>
                        </th>
                        <td>
                            <input type="password" name="password" size="10" maxlength="20" value="<?php if(!empty($_POST['password'])) {echo h($_POST['password']);}?>"><br>
                        </td>
                    </tr>
                </table>
                    <?php if (!empty($error['login'])): ?>
                        <p class="error"><?= $error_msg ?></p>
                    <?php endif; ?>
                <br>
                <input type="submit" name="login" value="ログイン">
            </form>
            
            <p>新規登録は<a href="/create">　こちらから　</a>お願いします。</p>
            <br>
            <p><a href="/pass_form">パスワードを忘れた方はこちら</a></p>
        </div>
    </div>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>