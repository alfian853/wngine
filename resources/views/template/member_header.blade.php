<nav class="navbar navbar-expand-sm borderYtoX">
  <ul class="navbar-nav  ml-auto">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('member.profile') }}">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('member.job.list') }}">My Projects</a>
    </li>
    <li>
      <a class="nav-link" href="{{ route('logout') }}">Log out</a>
    </li>
  </ul>
</nav>
