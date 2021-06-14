
<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header2.php'); ?>
<body>
<form action="/mypage/mylist/edit?id=<?= $service_id ?>" method="POST">

<!-- ※DBから予め登録したデータを引っ張りたい -->
<?php foreach($service as $value): ?>
    <p>サービス名：<input type="text" name="name" value="<?= $value['name'] ?>"></p>
    <?php if ($error['name'] === 'blank'): ?>
      <p class="error">サービス名を入力してください。</p>
    <?php  endif; ?>

    <!-- セレクタの場合セッションで記憶できるのか？ -->
    <p>ジャンル： 
      <select name="genre" id="">
        <?php foreach( $genre as $i => $v){ ?>
          <option value="<?php echo $i; ?>"><?php echo $v; ?></option>
        <?php } ?>
      </select>
    </p>
    <?php if ($error['genre'] === 'blank'): ?>
      <p class="error">ジャンルを選択してください。</p>
    <?php  endif; ?>

    <p>支払い種別：
      <select name="payment_type" id="">
        <?php foreach( $payment_type as $i => $v){ ?>
          <option value="<?php echo $i; ?>"><?php echo $v; ?></option>
        <?php } ?>
      </select>
    </p>
    <?php if ($error['payment_type'] === 'blank'): ?>
      <p class="error">支払い種別を選択してください。</p>
    <?php  endif; ?>

    <p>金額：<input type="text" name="monthly_fee" value="<?= $value['monthly_fee'] ?>">円</p>
    <?php if ($error['monthly_fee'] === 'blank' || $error['monthly_fee'] === 'wrong'): ?>
      <p class="error">0より大きい金額を入力してください。</p>
    <?php  endif; ?>

    <!-- ここはどうするべきか -->
    <p>支払い日時：<input type="date" name="payment_date" value="<?= $value['payment_date'] ?>"></p>
    <p>支払い方法：
      <select name="payment_method" id="">
        <?php foreach( $payment_method as $i => $v) { ?>
          <option value="<?php echo $i; ?>"><?php echo $v; ?></option>
        <?php } ?>
      </select>
      <?php if ($error['payment_type'] === 'blank'): ?>
        <p class="error">支払い方法を選択してください。</p>
      <?php  endif; ?>
    </p>
    <p>備考：<br>
    <textarea name="note" id="" cols="40" rows="10"><?= $value['note'] ?></textarea></p>
    <input type="submit" name="submit" value="更新">
  <?php endforeach; ?>
  </form>

</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>