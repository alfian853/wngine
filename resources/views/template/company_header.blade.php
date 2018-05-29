<nav class="navbar navbar-expand-sm borderYtoX">
  <ul class="navbar-nav  ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('company.job.list') }}">Project List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('company.profile') }}">Company Profile</a>
    </li>
      <a class="nav-link" href="#">Top Up</a>
    </li>
    <li>
      <a class="nav-link" href="{{ route('logout') }}">Log out</a>
    </li>
  </ul>
</nav>
