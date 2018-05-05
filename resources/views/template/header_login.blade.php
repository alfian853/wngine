<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#"> {{ Session::get('login') }}</a>
  <div class="w-100" id="top-navbar">
    <ul class="navbar-nav float-right">
      <li>
        <a class="nav-link" href="#">Profil</a>
      </li>
      <li>
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </li>
    </ul>
  </div>
</nav>
