<?php require_once(dirname(__FILE__).'/../views/head.php'); ?>
<?php require_once(dirname(__FILE__).'/../views/header.php'); ?>
<div class="signup_layout wrapper">
    <div class="main signup_form">
        <h2><?=$page_title?></h2>
        <form action="" method="POST">
            <table class="input">
                <tr>
                    <th>
                        <label for="username">ユーザー名：</label>
                    </th>
                    <td>
                        <input type="text" name="name" size="35" maxlength="255" value="<?php echo h($_POST['name']);?>"><br>
                    </td>
                </tr>
                
                <tr>
                    <th>
                        <label for="email">メールアドレス： </label>
                    </th>
                    <td>
                        <input type="address" name="address" size="35" maxlength="255" value="<?php echo h($_POST['address']);?>"><br>
                    </td>
                    <td> 
                        <?php if ($error['address'] === 'email'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['EMAIL']?></p>
                        <?php endif; ?>
                        <?php if ($error['address'] === 'duplicate'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['DUPLICATE']?></p>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label for="password"> パスワード： </label>
                    </th>
                    <td>
                        <input type="password" name="password" size="10" maxlength="20" value="<?php echo h($_POST['password']);?>"><br>
                    </td>
                    <td>
                        <?php if ($error['password'] === 'unsafe'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['UNSAFE'] ?></p>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label for="password_conf"> パスワード確認： </label>
                    </th>
                    <td>
                        <input type="password" name="password_conf" size="10" maxlength="20" value="<?php echo h($_POST['password_conf']);?>"><br>
                    </td>
                    <td>
                        <?php if ($error['password_conf'] === 'length'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['LENGTH'] ?></p>
                        <?php endif; ?>
                        <?php if ($error['password_conf'] === 'wrong'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['WRONG'] ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <p class="error"><?= $validation_msg ?></p>
                    </td>
                </tr>
                <!-- ワンタイムトークンをセット -->
                <input type="hidden" name="one_token" value="<?= setToken(); ?>">
                <th>
                    <input type="submit" name="send" value="登録確認画面へ"><br>
                </th>
            </table>
        </form>



        既に登録済みの方はこちらから <a href="/login">ログイン</a> してください。
    </div>


</div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>