


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
        <?php echo htmlspecialchars($_POST['pay'],ENT_QUOTES);?>円
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
    <p>上記の情報を登録します。よろしいですか？</p>
    <a href="/mypage/mylist/regist?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" name="regist" value="登録する" /></div>
  </form>

      
  </div>
</div>
</body>
<?php require_once(dirname(__FILE__).'/footer.php'); ?>
</html>