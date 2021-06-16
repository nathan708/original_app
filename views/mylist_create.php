
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>

<body>
  <form action="/mypage/mylist/create/conf" method="POST">
    <p>サービス名：<input type="text" name="name" value="<?php echo h($_POST['name']);?>"></p>
    <?php if ($error['name'] === 'blank'): ?>
      <p class="error">サービス名を入力してください。</p>
    <?php  endif; ?>

    <p>ジャンル： 
      <select name="genre" id="">
        <?php foreach( $genre as $i => $v){ ?>
          <?php if ($_POST['genre'] == $i ) { ?>
            <option value="<?php echo $i; ?>" selected><?php echo $v; ?></option>
          <?php } else { ?>
            <option value="<?php echo $i; ?>"><?php echo $v; ?></option>
          <?php } ?>
        <?php } ?>
      </select>
      <?php if ($error['genre'] === 'blank'): ?>
      <p class="error">ジャンルを選択してください。</p>
      <?php  endif; ?>
    </p>

    <p>支払い種別：
        <select name="payment_type" id="">
          <?php foreach( $payment_type as $i => $v){ ?>
            <?php if ($_POST['payment_type'] == $i) { ?>
              <option value="<?php echo $i; ?>" selected><?php echo $v; ?></option>
            <?php }else { ?>
              <option value="<?php echo $i; ?>"><?php echo $v; ?></option>
            <?php } ?>
          <?php } ?>
        </select>
        <?php if ($error['payment_type'] === 'blank'): ?>
        <p class="error"> 支払い種別を選択してください。</p>
        <?php  endif; ?>
    </p>

    <p>金額：<input type="text" name="monthly_fee" value="<?php echo h($_POST['monthly_fee']);?>">円</p>
    <?php if ($error['monthly_fee'] === 'blank' || $error['monthly_fee'] === 'wrong'): ?>
      <p class="error">０より大きい金額を入力してください。</p>
    <?php  endif; ?>

<!-- 直近の支払日を入力してもらい、種別で月額なら毎月表示する、年額なら毎年表示する -->
    <p>支払い日：<input type="date" name="payment_date" value="<?php echo h($_POST['payment_date']);?>"></p>
    <p>支払い方法：
      <select name="payment_method" id="">
        <?php foreach( $payment_method as $i => $v) { ?>
          <?php if ($_POST['payment_method'] == $i) { ?>
            <option value="<?php echo $i; ?>" selected><?php echo $v; ?></option>
          <?php }else { ?>
            <option value="<?php echo $i; ?>" ><?php echo $v; ?></option>
          <?php } ?>
        <?php } ?>
      </select>
      <?php if ($error['payment_method'] === 'blank'): ?>
      <p class="error"> 支払い方法を選択してください。</p>
      <?php  endif; ?>
    </p>
    <p>備考：<br>
    <textarea name="note" id="" cols="40" rows="10"></textarea></p>
    <input type="hidden" name="one_token" value="<?= h(setToken()); ?>">
    <input type="submit" name="submit" value="新規登録">
  </form>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>