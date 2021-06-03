<?php 
session_start();


$genre = array("", "動画", "本・雑誌", "ウェブサービス" , "ショッピング", "その他");
$payment_type = array("月額", "年額", "その他");
$payment_method = array("クレジットカード", "銀行引き落とし", "その他");


// エラーチェック
if (!empty($_POST)) {

  if (empty($_POST['name'])) {
    $error['name'] = 'blank';
  }
  if (empty($_POST['genre'])) {
    $error['genre'] === 'blank';
  }
  if (empty($_POST['payment_type'])) {
    $error['payment_type'] = 'blank';
  }
  if (empty($_POST['pay'])) {
    $error['pay'] = 'blank';
  }
  if (empty($_POST['payment_date'])) {
    $error['payment_date'] = 'blank';
  }
  if (empty($_POST['payment_method'])) {
    $error['payment_method'] = 'blank';
  }

  if (empty($error)) {
    $_SESSION['regist'] = $_POST;
    header('Location: mylist_regist_conf.php');
    exit();
  }
}



?>


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <form action="" method="POST">
    <p>サービス名：<input type="text" name="name" value="<?php echo htmlspecialchars(($_POST['name']), ENT_QUOTES);?>"></p>
    <?php if ($error['name'] === 'blank'): ?>
      <p class="error">サービス名を入力してください。</p>
    <?php  endif; ?>

    <!-- セレクタの場合セッションで記憶できるのか？ -->
    <p>ジャンル： 
      <select name="genre" id="">
        <?php foreach( $genre as $i => $v){ ?>
        <option value=" <?php echo $i; ?> "><?php echo $v; ?></option>
        <?php } ?>
      </select>
    </p>
    <!-- === でないと反応しない。。。これはPHPの処理の関係？ -->
    <!-- そして、このままだとページにアクセスするとすぐ出現してしまう -->
    <!-- <?php if ($error['genre'] === 'blank'): ?>
      <p>ジャンルを選択してください。</p>
    <?php  endif; ?> -->

    <p>支払い種別：
        <select name="payment_type" id="">
          <?php foreach( $payment_type as $i => $v){ ?>
            <option value=" <?php echo $i; ?> "><?php echo $v; ?></option>
          <?php } ?>
          </select>
    </p>
    <!-- <?php if ($error['payment_type'] = 'blank'): ?>
      <p>支払い種別を選択してください。</p>
    <?php  endif; ?> -->

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