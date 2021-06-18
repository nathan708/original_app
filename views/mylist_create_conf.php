


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header.php'); ?>
<body>
  <h2><?= $page_title ?></h2>
  <div class="main">
  <form action="/mypage/mylist/create/fin" method="POST">
    <table>
      <tr>
        <th>サービス名：　</th>
        <td>
        <?= h($_POST['name']);?>
        </td>
      </tr>
      <tr>
        <th>ジャンル：　</th>
        <td>
        <?= h(GENRE[$_POST['genre']]); ?><br>
        </td>
      </tr>

      <tr>
        <th>支払い種別：　</th>
        <td>
        <?= h(PAYMENT_TYPE[$_POST['payment_type']]);?>
        </td>
      </tr>
      <tr>
        <th>金額：　</th>
        <td>
        <?= h($_POST['monthly_fee']);?>円
        </td>
      </tr>
      <tr>
        <th>支払日：　</th>
        <td>
        <?= h($_POST['payment_month']);?>月<?= h($_POST['payment_day']);?>日
        </td>
      </tr>
      <tr>
        <th>支払い方法：　</th>
        <td>
        <?= h(PAYMENT_METHOD[$_POST['payment_method']]);?>
        </td>
      </tr>
      <tr>
        <th>備考：　</th>
        <td>
        <?= h($_POST['note']);?>
        </td>
      </tr>
    </table>
      <!-- Hiddenでポスト送信 -->
      <input type="hidden" name="user_id" value="<?= h($_SESSION['id'])?>">
      <input type="hidden" name="name" value="<?= h($_POST['name'])?>">
      <input type="hidden" name="genre" value="<?= h($_POST['genre'])?>">
      <input type="hidden" name="payment_type" value="<?= h($_POST['payment_type'])?>">
      <input type="hidden" name="monthly_fee" value="<?= h($_POST['monthly_fee'])?>">
      <input type="hidden" name="payment_month" value="<?= h($_POST['payment_month'])?>">
      <input type="hidden" name="payment_day" value="<?= h($_POST['payment_day'])?>">
      <input type="hidden" name="payment_method" value="<?= h($_POST['payment_method'])?>">
      <input type="hidden" name="note" value="<?= h($_POST['note'])?>">
    <p>上記の情報を登録します。よろしいですか？</p>
      <!-- ワンタイムトークン確認用 -->
      <input type="hidden" name="one_token" value="<?= $_POST['one_token'] ?>">

    <input type="submit" name="create" value="登録する" >
  </form>

  <form action="" method="POST">
      <input type="hidden" name="name" value="<?= h($_POST['name'])?>">
      <input type="hidden" name="genre" value="<?= h($_POST['genre'])?>">
      <input type="hidden" name="payment_type" value="<?= h($_POST['payment_type'])?>">
      <input type="hidden" name="monthly_fee" value="<?= h($_POST['monthly_fee'])?>">
      <input type="hidden" name="payment_month" value="<?= h($_POST['payment_month'])?>">
      <input type="hidden" name="payment_day" value="<?= h($_POST['payment_day'])?>">
      <input type="hidden" name="payment_method" value="<?= h($_POST['payment_method'])?>">
      <input type="hidden" name="note" value="<?= h($_POST['note'])?>">

      <!-- ワンタイムトークン確認用 -->
      <input type="hidden" name="one_token" value="<?= $_POST['one_token'] ?>">

      <input type="submit" name="rewrite" value="書き直す" >
  </form>
      

  </div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>