<header id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->
                <ul class="nav-social">
                    <li><a href="https://web.facebook.com/sfadoilul/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/Fadoilulmun_im" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/fadoilulmun.im/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{ url('') }}" class="logo"><img src="{{ asset('assets-callie/img/logo.png') }}" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div id="nav-search">
                        <form action="{{ route('blog.search') }}" method="GET">
                            <input class="input" name="search" placeholder="Enter your search...">
                        </form>
                        <button class="nav-close search-close">
                            <span></span>
                        </button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->
                <ul class="nav-menu">
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li class="has-dropdown">
                        <a>Categories</a>
                        <div class="dropdown">
                            <div class="dropdown-body">
                                <ul class="dropdown-list">
                                    @foreach ($category as $hasil)
                                        <li><a href="{{ route('blog.category', $hasil->slug) }}">{{ $hasil->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('blog.list') }}">List Post</a></li>
                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
                <li><a href="{{ url('') }}">Home</a></li>
                <li class="has-dropdown"><a>Categories</a>
                    <ul class="dropdown">
                        @foreach ($category as $hasil)
                            <li><a href="{{ route('blog.category', $hasil->slug) }}">{{ $hasil->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('blog.list') }}">List Post</a></li>
            </ul>
            <button class="nav-close nav-aside-close"><span></span></button>
            <ul style="position: absolute; bottom: 0; width:88%" class="nav-aside-menu">
                <hr style="margin-bottom: -7px">
                <li><a href="{{ route('login') }}">Create Post</a></li>
            </ul>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->
</header>
