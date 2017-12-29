<nav class="nav has-shadow">
            <div class="container">
                <div class="nav-left">
                    <a class="nav-item" href="{{ route('home') }}">
                       <img src="#" alt="appMarket Logo" />
                    </a>
                    <a href="#" class="nav-item is-tab is-hidden-mobile m-l-10">Learn</a>
                    <a href="#" class="nav-item is-tab is-hidden-mobile">Discuss</a>
                    <a href="#" class="nav-item is-tab is-hidden-mobile">Share</a>
                </div>

                <div class="nav-right" style="overflow: visible;">
                    @if (Auth::guest())
                        <a href="{{ route('login') }}" class="nav-item is-tab">Login</a>
                        <a href="{{ route('register') }}" class="nav-item is-tab">Join the Community</a>
                    @else
                        <button class="dropdown is-aligned-right nav-item is-tab">
                            Hey Alex <span class="icon"><i class="fa fa-caret-down"></i></span>
                            <ul class="dropdown-menu">
                                <li><a href="#">
                                <span class="icon"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i></span>
                                Profile</a></li>
                                <li><a href="#">
                                <span class="icon"><i class="fa fa-fw m-r-10 fa-bell"></i></span>
                                Notifications</a></li>
                                <li><a href="#">
                                <span class="icon"><i class="fa fa-fw m-r-10 fa-cog"></i></span>
                                Settings</a></li>
                                <li class="separator"></li>
                                <li><a href="#">
                                <span class="icon"><i class="fa fa-fw m-r-10 fa-sign-out"></i></span>
                                Logout</a></li>
                            </ul>
                        </button>

                    @endif

                </div>
            </div>
</nav>
