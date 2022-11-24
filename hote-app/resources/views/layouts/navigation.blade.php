<!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">Hotel La Sinventura
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                    <li class="nav-item">
                    <a class="nav-link" href="/dashboard"><i class="ficon" data-feather="home"></i></a>
                </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard"><i class="ficon" data-feather="home"></i></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
                </li>
                
                <li class="nav-item nav-search"><a class="nav-link nav-link-search">
                    <i class="ficon" data-feather="search"></i></a>
                    <div class="search-input">
                        
                        <div class="search-input-icon"><i data-feather="search"></i></div>
                        <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
                        <div class="search-input-close"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
                @guest
                    <li><a href="/login">Iniciar sesion</a></li>
                @endguest
                @auth
                    <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ Auth::user()->name }}</span><span class="user-status">{{ Auth::user()->email }}</span></div><span class="avatar"><img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                            <a class="dropdown-item" href="/bookings"><i class="me-50" data-feather="message-square"></i>Reservaciones</a>
                            <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <p class="dropdown-item" href="auth-login-cover.html"><i class="me-50" data-feather="power"></i> Logout</p>
                                    </x-dropdown-link>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>