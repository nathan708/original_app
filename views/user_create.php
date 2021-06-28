<?php require_once(dirname(__FILE__).'/../views/head.php'); ?>
<?php require_once(dirname(__FILE__).'/../views/header.php'); ?>
<div class="signup_layout wrapper">
    <div class="user_create_login">
        <h2><?=$page_title?></h2>
        <form action="" method="POST">
            <table class="input">
                <tr>
                    <th>
                        <label for="username">ユーザー名：</label>
                    </th>
                    <td>
                        <input type="text" name="name" size="35" maxlength="255" value="<?php if($_POST) {echo h($_POST['name']);}?>">
                    </td>
                </tr>
                
                <tr>
                    <th>
                        <label for="email">メールアドレス： </label>
                    </th>
                    <td>
                        <input type="address" name="address" size="35" maxlength="255" value="<?php if (!empty($_POST)) {echo h($_POST['address']);}?>">
                    </td>
                    <td> 
                        <?php if(!empty($error) && $error['address'] === 'email'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['EMAIL']?></p>
                        <?php endif; ?>
                        <?php if (!empty($error) && $error['address'] === 'duplicate'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['DUPLICATE']?></p>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label for="password"> パスワード： </label>
                    </th>
                    <td>
                        <input type="password" name="password" size="10" maxlength="20" value="<?php if(!empty ($_POST)) {echo h($_POST['password']);}?>"><br>
                    </td>
                    <td>
                        <?php if (!empty($error['password']) && $error['password'] == 'unsafe'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['UNSAFE'] ?></p>
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label for="password_conf"> パスワード確認： </label>
                    </th>
                    <td>
                        <input type="password" name="password_conf" size="10" maxlength="20" value="<?php if (!empty($_POST)) {echo h($_POST['password_conf']);}?>"><br>
                    </td>
                    <td>
                        <?php if (!empty($error['password_conf']) && $error['password_conf'] == 'wrong'): ?>
                            <p class="error"><?= ERROR_MEASSAGE['WRONG'] ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <p class="error"><?php if(!empty($validation_msg)) {echo $validation_msg;} ?></p>
                    </td>
                </tr>
                <!-- ワンタイムトークンをセット -->
                <input type="hidden" name="one_token" value="<?= setToken(); ?>">
                <th></th>
                <td>
                    <input type="submit" name="send" value="登録確認画面へ"><br>
                </td>
            </table>
        </form>



        既に登録済みの方はこちらから <a href="/login">ログイン</a> してください。
    </div>


</div>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>