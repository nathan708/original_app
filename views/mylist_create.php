<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>

<body>

  <div class="mylist_layout">
    <h2 class="page_title"><?= $page_title ?></h2>  
    <form action="" method="POST">
      <table class="input">
        <tr>
          <th>サービス名：</th>
          <td>
            <input type="text" name="name" size="35" maxlength="255" value="<?php if(!empty($_POST['name'])) {echo h($_POST['name']);}?>"></p>
          </td>
          <td>
            <?php if(!empty($error['name'])): ?>
              <p class="error">サービス名を入力してください。</p>
            <?php  endif; ?>
          </td>
        </tr>

        <tr>
          <th>ジャンル：</th>
            <td>
              <select name="genre" id="">
                <?php if(!empty ($genre)) { ?>
                  <?php  foreach( $genre as $i => $v){ ?>
                    <?php if(!empty($_POST) && $_POST['genre'] == $i ) { ?>
                      <option value="<?= $i; ?>" selected><?= $v; ?></option>
                  <?php } else { ?>
                    <option value="<?= $i; ?>"><?= $v; ?></option>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
              </select>

            </td>
            <td>
              <?php if (!empty($error['genre'])):?>
                <p class="error">ジャンルを選択してください。</p>
              <?php  endif; ?>
            </td>
        </tr>

        <tr>
          <th>支払い種別：</th>
            <td>
            <select name="payment_type" id="">
              <?php if(!empty($payment_type)) { ?>
                <?php foreach( $payment_type as $i => $v){ ?>
                  <?php if (!empty($_POST) && $_POST['payment_type'] == $i) { ?>
                    <option value="<?= $i; ?>" selected><?= $v; ?></option>
                  <?php }else { ?>
                    <option value="<?= $i; ?>"><?= $v; ?></option>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </select>
            </td>
            <td>
              <?php if (!empty($error['payment_type'])): ?>
                <p class="error"> 支払い種別を選択してください。</p>
              <?php  endif; ?>
            </td>
        </tr>

        <tr>
          <th>金額：</th>
          <td>
            <input type="text" name="monthly_fee" size="25" maxlength="8" value="<?php if(!empty($_POST)) {echo h($_POST['monthly_fee']);}?>">円</p>
          </td>
          <td>
            <?php if (!empty($error['monthly_fee'])): ?>
              <p class="error">０より大きい金額を入力してください。</p>
            <?php  endif; ?>
          </td>
        </tr>

        <tr>
          <th>支払い日：</th>
          <td>
            <select name="payment_month" id="">
              <?php if(!empty ($payment_month)) { ?>
                <?php foreach( $payment_month as $i => $v) { ?>
                  <?php if(!empty($_POST) && $_POST['payment_month'] == $i) { ?>
                    <option value="<?= $i; ?>" selected><?= $v; ?></option>
                  <?php }else { ?>
                    <option value="<?= $i; ?>" ><?= $v; ?></option>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </select>月
            <select name="payment_day" id="">
              <?php if(!empty($payment_day)) { ?>
                <?php  foreach( $payment_day as $i => $v) { ?>
                  <?php if(!empty($_POST) && $_POST['payment_day'] == $i) { ?>
                    <option value="<?= $i; ?>" selected><?= $v; ?></option>
                  <?php }else { ?>
                    <option value="<?= $i; ?>" ><?= $v; ?></option>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </select>日
          </td>
          <td>
            <?php if (!empty($error['payment_date'])): ?>
              <p class="error">直近の支払い日の”月”と”日”を両方選択してください。</p>
            <?php  endif; ?>
          </td>
        </tr>
        

        <tr>
          <th>支払い方法：</th>
          <td>
            <select name="payment_method" id="">
              <?php if(!empty($payment_method)) { ?>
                <?php foreach( $payment_method as $i => $v) { ?>
                  <?php if (!empty($_POST) && $_POST['payment_method'] == $i) { ?>
                    <option value="<?= $i; ?>" selected><?= $v; ?></option>
                  <?php }else { ?>
                    <option value="<?= $i; ?>" ><?= $v; ?></option>
                  <?php } ?>
                <?php } ?>
              <?php } ?>
            </select>
          </td>
          <td>
            <?php if (!empty($error['payment_method'])): ?>
              <p class="error"> 支払い方法を選択してください。</p>
            <?php  endif; ?>
          </td>
        </tr>

        <tr>
          <th>備考：</th>
          <td>
            <textarea name="note" id="" cols="40" rows="10" maxlength="600"></textarea>
          </td>
        </tr>

      <!-- ワンタイムトークン用 -->
        <input type="hidden" name="one_token" value="<?= h(setToken()); ?>">
        <tr>
          <td></td>
          <td>
            <input type="submit" name="submit" value="登録確認画面へ">
          </td>
        </tr>
      </table>

    </form>
  </div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>