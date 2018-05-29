<nav class="navbar navbar-expand-sm borderYtoX fixed-top">
  <ul class="navbar-nav  ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sign Up
        </a>
        <div class="dropdown-menu" style="background:grey" aria-labelledby="navbarDropdownMenuLink">
          <a class="nav-link"  href="{{ route('member.register') }}">Member</a>
          <a class="nav-link"  href="{{ route('company.register') }}">Company</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
  </ul>
</nav>