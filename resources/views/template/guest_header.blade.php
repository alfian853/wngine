<div class="pos-f-t fixed-top">
  <div class="collapse" id="navbarToggleExternalContent">
  <nav class="navbar borderYtoX">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('job.search') }}">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item">
      <a class="nav-link"  href="{{ route('member.register') }}">Sign Up Member</a>
      </li>
      <li class="nav-item">
      <a class="nav-link"  href="{{ route('company.register') }}">Sign Up Company</a>
      </li>
    </ul>
  </nav>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>