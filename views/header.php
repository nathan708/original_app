  <div class="wrapper">
    <header>
      <!-- ログインしている状態ならこちらのheader -->
      <div id="page_header">
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
      </div>
      <hr>

        <!-- ログインしてない状態ならこちらのheader -->
      <?php } else { ?>
        <div id="page_header">
          <h1><a href="/">サブスクリプション管理</a></h1>
          <nav>
            <ul class="top_nav">
              <li><a href="/create">新規登録</a></li>
              <li><a href="/login">ログイン</a></li>
              <li><a href="/contact">お問い合わせ</a></li>
            </ul>
          </nav>
        </div>
      <?php } ?>
    </header> 
  </div>

