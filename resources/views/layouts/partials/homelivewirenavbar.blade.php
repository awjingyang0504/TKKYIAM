<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">
    <h1 class="logo"><a href="index.html"></a></h1>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="/">Home</a></li>
        <li><a class="nav-link scrollto " href="/participantlist">Participant List</a></li>
        <li><a class="nav-link scrollto" href="/notification">Notification</a></li>
        <li><a class="nav-link scrollto " href="/result">Result</a></li>
        @can('RegisterCompetition')
        <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
        @endif

        @can('ManageandActivity')
        <li><a class="nav-link scrollto" href="/manage-dashboard">Dashboard</a></li>
        @endif

        @if (Route::has('login'))
        @auth
        <li>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Log Out
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        @endauth
        @endif
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header><!-- End Header -->