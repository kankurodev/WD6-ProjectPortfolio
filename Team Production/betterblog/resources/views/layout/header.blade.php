<header>
    <div class="container-fluid mb-3">
        <nav class="navbar navbar-expand-md navbar-dark rounded-bottom font-weight-bold">
            {{--Branding Logo / Homepage link--}}
            <a class="navbar-brand pb-2" href="{{ route('splash') }}">
                <img style="height: 50px;" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>

            {{--Hamburger Menu--}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                {{--Navigational Links--}}
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('splash') }}" class="nav-link {{ Route::is('splash')? 'active': '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('blogs') }}" class="nav-link {{ Route::is('blogs')? 'active': '' }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link {{ Route::is('contact')? 'active': '' }}">Contact</a>
                    </li>
                </ul>

                {{--Login / User Links--}}
                <ul class="nav navbar-nav ml-auto">
                    {{--Check if user is logged in--}}

                    @if (Auth::guest())
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" href="#">
                                Login <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu border-0 dropdown-menu-right" role="menu">
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="dropdown-item nav-link font-weight-bold pl-2">
                                        <i class="fas fa-at text-primary social-media-icon"></i> Login with Email
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="redirect/facebook" class="dropdown-item nav-link font-weight-bold pl-2">
                                        <i class="fab fa-facebook-f social-media-icon" style="color: #3b5998;"></i> Login with Facebook
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="redirect/google" class="dropdown-item nav-link font-weight-bold pl-2">
                                        <i class="fab fa-google-plus-g social-media-icon" style="color: #dd4b39;"></i> Login with Google+
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ml-0 ml-md-auto">
                            <a class="nav-link {{ Route::is('register')? 'active': '' }}" href="{{ route('register') }}">Register</a>
                        </li>

                    @else
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu border-0 dropdown-menu-right" role="menu">
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link font-weight-bold pl-2" href="{{ route('create-blog') }}">Write Blog</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item nav-link font-weight-bold pl-2" href="{{ route('show-profile', Auth::user()->id) }}">Profile</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item nav-link font-weight-bold pl-2" href="{{ route('user-blogs', Auth::user()->id) }}">My Blogs</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item nav-link font-weight-bold pl-2" href="{{ route('edit-info', Auth::user()->id) }}">Update Account</a>
                                </li>

                                <li class="nav-item">
                                    <a class="dropdown-item nav-link font-weight-bold pl-2" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
