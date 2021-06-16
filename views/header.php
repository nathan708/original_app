  <div class="wrapper">
    <header id="page_header">

      <!-- ログインしている状態ならこちらのheader -->
      <?php     if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) { ?>
            <h1><a href="/mypage">サブスクリプション管理</a></h1>
            <nav>
              <ul class="top_nav">
                <li><a href="/mypage/mylist">マイサブスクリプション一覧</a></li>
                <li><a href="/mypage/mylist/create">マイサブスクリプション登録</a></li>
                <li><a href="/contact">お問い合わせ</a></li>
                <li><a href="/logout">ログアウト</a></li>
              </ul>
            </nav>

      <!-- ログインしてない状態ならこちらのheader -->
      <?php } else { ?>
        <h1><a href="/">サブスクリプション管理</a></h1>
            <nav>
              <ul class="top_nav">
                <li><a href="/create">新規登録</a></li>
                <li><a href="/login">ログイン</a></li>
                <li><a href="/contact">お問い合わせ</a></li>
              </ul>
            </nav>
      <?php } ?>

    </header> 
  </div>

