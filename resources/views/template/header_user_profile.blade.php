<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
   <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User-Name
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Edit Profile</a>
          <a class="dropdown-item" href="#">Hide Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a>
        </div>
      </li>
    </ul>
</nav>
