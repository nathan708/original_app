<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header2.php'); ?>
<body>
  <form action="" method="POST">
    <p>サービス名：<input type="text" name="name" value="<?php echo htmlspecialchars(($_POST['name']), ENT_QUOTES);?>"></p>
    <?php if ($error['name'] === 'blank'): ?>
      <p class="error">サービス名を入力してください。</p>
    <?php  endif; ?>

    <p>ジャンル： 
      <select name="genre" id="">
        <?php foreach( $genre as $i => $v){ ?>
          <option value=" <?php echo $i; ?> "><?php echo $v; ?></option>
        <?php } ?>
      </select>
    </p>
 
    <p>支払い種別：
        <select name="payment_type" id="">
          <?php foreach( $payment_type as $i => $v){ ?>
            <option value=" <?php echo $i; ?> "><?php echo $v; ?></option>
          <?php } ?>
          </select>
    </p>

    <p>金額：<input type="text" name="pay" value="">円</p>
    <?php if ($error['pay'] === 'blank'): ?>
      <p class="error">金額を入力してください。</p>
    <?php  endif; ?>

    <!-- ここはどうするべきか -->
    <p>支払い日時：<input type="text" name="payment_date" value=""></p>
    <p>支払い方法：
      <select name="payment_method" id="">
        <?php foreach( $payment_method as $i => $v) { ?>
          <option value=" <?php echo $i; ?> "><?php echo $v; ?></option>
        <?php } ?>
      </select>
    </p>
    <p>備考：<br>
    <textarea name="note" id="" cols="40" rows="10"></textarea></p>
    <input type="submit" name="submit" value="新規登録">

  </form>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>