  <div class="wrapper">
    <header id="page_header">


<?php     if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) { ?>
      <h1><a href="/mypage">サブスクリプション管理</a></h1>
      <nav>
        <ul class="top_nav">
          <li><a href="/mypage/mylist">マイサブスクリプション一覧</a></li>
          <li><a href="/mypage/mylist/regist">マイサブスクリプション登録</a></li>
          <li><a href="/contact">お問い合わせ</a></li>
          <li><a href="/logout">ログアウト</a></li>
        </ul>
      </nav>
<?php } else { ?>
  <h1><a href="/">サブスクリプション管理</a></h1>
      <nav>
        <ul class="top_nav">
          <li><a href="/signup">新規登録</a></li>
          <li><a href="/login">ログイン</a></li>
          <li><a href="/contact">お問い合わせ</a></li>
        </ul>
      </nav>
<?php } ?>









    <!-- もしセッションの中身が空ならログイン前トップ (ログインしたらsessionになにか入っているはずだから) -->
    <!-- <?php if (!isset($_SESSION)) { ?>
      <h1><a href="/">サブスクリプション管理</a></h1>
      <nav>
        <ul class="top_nav">
          <li><a href="/signup">新規登録</a></li>
          <li><a href="/login">ログイン</a></li>
          <li><a href="/contact">お問い合わせ</a></li>
        </ul>
      </nav> -->


<!-- もしSessionに入っていたらログイン後のトップ -->
      <!-- <?php } elseif (isset($_SESSION)) { ?>
      <h1><a href="/mypage">サブスクリプション管理</a></h1>
      <nav>
        <ul class="top_nav">
          <li><a href="/mypage/mylist">マイサブスクリプション一覧</a></li>
          <li><a href="/mypage/mylist/regist">マイサブスクリプション登録</a></li>
          <li><a href="/contact">お問い合わせ</a></li>
          <li><a href="/logout">ログアウト</a></li>
        </ul>
      </nav>
      <?php } ?> -->



    </header> 
  </div>

