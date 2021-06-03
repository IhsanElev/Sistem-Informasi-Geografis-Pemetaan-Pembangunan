<form class="form-inline mr-auto" action="">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
        </li>
    </ul>

</form>
<ul class="navbar-nav navbar-right">
    @auth
    <li class="dropdown"><a href="" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Welcome, {{ Auth::user()->name }}</div>

            <div class="dropdown-divider"></div>
            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                Edit Profile
            </a>
            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
    @endauth
</ul>