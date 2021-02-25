<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="active"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Starter</li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('post.index') }}">Posts List</a></li>
          <li><a class="nav-link" href="{{ route('post.tampil_hapus') }}">Posts List Dihapus</a></li>
        </ul>
      </li>

    @if (Auth::user()->tipe == 1)
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Category</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('category.index') }}">Catgeories List</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-hashtag"></i> <span>Tag</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('tag.index') }}">Tags List</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>User</span></a>
            <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('user.index') }}">Users List</a></li>
            </ul>
        </li>
    @endif

    </ul>
</aside>
