<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <h2 class="navbar-brand">@yield('title')</h2>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if (auth()->user()->avatar)
                                <img style="border-radius: 50%; width: 40px; height: 40px;" src="{{ asset(auth()->user()->avatarUrl()) }}" alt="{{ auth()->user()->name }}'s Profile Image" class="img-fluid">
                            @else
                                <img style="width: 40px; height: 40px;" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&rounded=true&name={{ auth()->user()->name .' '. auth()->user()->subname }}" alt="">
                            @endif
                              {{-- <p>{{ Auth::user()->subname .' '. Auth::user()->name }}</p> --}}
                              <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" style="height: 80px;">
                            <li style="width: 100%;"><a href="{{ route('admin.profile.edit') }}" class="linkProfil"><i class="ti-user"></i>Profile</a></li>
                            <form action="{{ route('auth.logout') }}" method="post">

                                @csrf
                                @method("delete")

                                <li class="liLogout">
                                    <button class="btnLogout"><i class="ti-shift-left"></i>Se déconnecter</button>
                                </li>
                            </form>
                        </ul>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
