


<html lang="ja">
<?php require_once(dirname(__FILE__).'/head.php'); ?>
<?php require_once(dirname(__FILE__).'/header2.php'); ?>
<body>
 
  <div class="main">
  <form action="/mypage/mylist/regist/fin" method="POST">
    <table>
      <tr>
        <th>サービス名：　</th>
        <td>
        <?php echo htmlspecialchars($_POST['name'],ENT_QUOTES);?>
        </td>
      </tr>
      <tr>
        <th>ジャンル：　</th>
        <td>
        <?php echo htmlspecialchars(GENRE[$_POST['genre']],ENT_QUOTES); ?><br>
        </td>
      </tr>

      <tr>
        <th>支払い種別：　</th>
        <td>
        <?php echo htmlspecialchars(PAYMENT_TYPE[$_POST['payment_type']],ENT_QUOTES);?>
        </td>
      </tr>
      <tr>
        <th>金額：　</th>
        <td>
        <?php echo htmlspecialchars($_POST['monthly_fee'],ENT_QUOTES);?>円
        </td>
      </tr>
      <tr>
        <th>支払日：　</th>
        <td>
        <?php echo htmlspecialchars($_POST['payment_date'],ENT_QUOTES);?>
        </td>
      </tr>
      <tr>
        <th>支払い方法：　</th>
        <td>
        <?php echo htmlspecialchars(PAYMENT_METHOD[$_POST['payment_method']],ENT_QUOTES);?>
        </td>
      </tr>
      <tr>
        <th>備考：　</th>
        <td>
        <?php echo htmlspecialchars($_POST['note'],ENT_QUOTES);?>
        </td>
      </tr>
    </table>
<!-- Hiddenでポスト送信 -->
<input type="hidden" name="user_id" value="<?=htmlspecialchars($_SESSION['id'],ENT_QUOTES)?>">
<input type="hidden" name="name" value="<?=htmlspecialchars($_POST['name'],ENT_QUOTES)?>">
<input type="hidden" name="genre" value="<?=htmlspecialchars($_POST['genre'],ENT_QUOTES)?>">
<input type="hidden" name="payment_type" value="<?=htmlspecialchars($_POST['payment_type'],ENT_QUOTES)?>">
<input type="hidden" name="monthly_fee" value="<?=htmlspecialchars($_POST['monthly_fee'],ENT_QUOTES)?>">
<input type="hidden" name="payment_date" value="<?=htmlspecialchars($_POST['payment_date'],ENT_QUOTES)?>">
<input type="hidden" name="payment_method" value="<?=htmlspecialchars($_POST['payment_method'],ENT_QUOTES)?>">
<input type="hidden" name="note" value="<?=htmlspecialchars($_POST['note'],ENT_QUOTES)?>">


    <p>上記の情報を登録します。よろしいですか？</p>
    <a href="/mypage/mylist/regist?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" name="regist" value="登録する" /></div>
  </form>

      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>