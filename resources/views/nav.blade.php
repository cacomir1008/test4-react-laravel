<nav class="navbar navbar-expand navbar-dark mean-fruit-gradient">

  <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>Find Coping</a>

  <ul class="navbar-nav ml-auto">
    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest
    
    <li class="nav-item">
      <a class="nav-link" href="/conditionlist"><i class="fas fa-search mr-1"></i>他の人の体験談を検索</a>
    </li>
    @auth
    <li class="nav-item">
      <a class="nav-link" href="{{ route('conditions.create') }}"><i class="fas fa-search mr-1"></i>病名登録</a>
    </li>
    @endauth

    @auth
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href='/'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
    </form>
  </ul>
  @endauth
</nav>
