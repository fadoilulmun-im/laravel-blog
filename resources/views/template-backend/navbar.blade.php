<ul class="navbar-nav mr-auto">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
</ul>
<ul class="navbar-nav navbar-right">
<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <img alt="image" src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
    <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
    <div class="dropdown-menu dropdown-menu-right">
    <a href="{{ route('user.edit', Auth::user()->id) }}" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Edit Account
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </a>
    </div>
</li>
</ul>
