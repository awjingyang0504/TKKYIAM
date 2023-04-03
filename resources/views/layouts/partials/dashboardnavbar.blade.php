<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">
    <h1 class="logo"><a href="index.html"></a></h1>
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="/home">Home</a></li>

        @can('RegisterCompetition')
        <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>

        <li><a class="nav-link scrollto " href="/register-page">Register Competition</a></li>
        @endif

        @can('ManageandActivity')
        <li><a class="nav-link scrollto" href="/manage-dashboard">Manage Dashboard</a></li>

        <li><a class="nav-link scrollto" href="/manage-competition">Manage Competition</a></li>

        <li><a class="nav-link scrollto" href="/manage-notification">Manage Notification</a></li>

        <li><a class="nav-link scrollto" href="/activity">Activity</a></li>
        @endif

        <li class="dropdown"><a href="#"><span>Setting</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="/paricipant-profile">Profile</a></li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Log Out
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header><!-- End Header -->