<nav class="navbar navbar-expand-lg japa-modern-nav animate__animated animate__fadeInDown ">
  <div class="container-fluid px-lg-5">

    <a class="navbar-brand japa-logo-wrap" href="{{ route('home') }}">
      <img src="/assets/media/imgs/logoText.png" alt="Japa Cars Logo" class="navbar-logo">
    </a>

    <button class="navbar-toggler japa-toggler border-0 p-2 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#japaNavbar" aria-controls="japaNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="japa-toggler-bar"></span>
      <span class="japa-toggler-bar middle"></span>
      <span class="japa-toggler-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="japaNavbar">
      <ul class="navbar-nav mx-auto japa-nav-center-links">
        <li class="nav-item">
          <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
            <span class="nav-num">01//</span>Home
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Route::is('car.index') ? 'active' : '' }}" href="{{ route('car.index') }}">
            <span class="nav-num">03//</span>Showroom
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-num">04//</span>Contact
          </a>
        </li>
      </ul>

      <div class="d-flex align-items-center gap-3 japa-auth-hub">

        @guest
          <a href="{{ route('login') }}" class="japa-link-login btn-japa-neon-outline me-2">Sign In</a>
          <a href="{{ route('register') }}" class="btn-japa-neon-outline">
            <span>Join Crew</span>
          </a>
        @endguest

        @auth
          <div class="dropdown">
            <button class="japa-profile-pill dropdown-toggle d-flex align-items-center gap-2" type="button" id="driverDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="avatar-radar">
                <span class="radar-ping"></span>
                <i class="bi bi-person-fill text-white fs-6"></i>
              </div>
              <div class="text-start d-none d-sm-block">
                <span class="d-block small text-muted uppercase tracking-wider font-monospace" style="font-size: 9px;">Logged in as</span>
                <span class="d-block text-white fw-bold text-eurostile tracking-wide" style="font-size: 13px;">{{ Auth::user()->name }}</span>
              </div>
            </button>

<ul class="dropdown-menu dropdown-menu-end japa-cyber-dropdown border-0 mt-3 py-2 shadow-lg" aria-labelledby="driverDropdown" data-bs-display="static">
  <div class="dropdown-header text-eurostile text-red tracking-wider">TERMINAL MENU</div>
  <li>
    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('user.index') }}">
      <i class="bi bi-speedometer2"></i> Dashboard
    </a>
  </li>
  <li><hr class="dropdown-divider bg-secondary opacity-10 m-0"></li>
  <li>
    <form action="{{ route('logout') }}" method="POST" class="m-0">
      @csrf
      <button type="submit" class="dropdown-item text-red d-flex align-items-center gap-2 py-2 w-100" style="background: none; border: none;">
        <i class="bi bi-power"></i> Disconnect
      </button>
    </form>
  </li>
</ul>
          </div>
          <a class="btn-japa-small-modern  {{ Route::is('car.index') ? ' d-none' : '' }} {{ Route::is('car.create') ? ' d-none' : '' }}" href="{{ route('car.create') }}">
              + Upload Asset
          </a>
        @endauth


      </div>
    </div>
  </div>
</nav>
