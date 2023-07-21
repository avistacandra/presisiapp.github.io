<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="{{ url('home') }}"><img src="{{ asset('/') }}images/ijo-smp.svg" alt="logo" />
                </br>
                <span class="d-flex justify-content-center border rounded" style="background-color: #C1D0B5; font-size:12px;">Login Sebagai: {{ Auth::user()->username }}</span>
            </a>
            {{-- <a class="navbar-brand brand-logo-mini" href="{{ url('home') }}"><img src="{{ asset('/') }}images/logo-mini.svg" alt="logo" /></a> --}}
            {{-- <b class=" text-bold text-success">SMP N 2 TEMPEL</b> --}}
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-sort-variant"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        {{-- <b class=" text-black text-bold">SMP N 2 TEMPEL</b> --}}
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    Selamat Datang, {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    {{-- <ul class="dropdown-item">
                        <a href="#" class="nav-link"><i class="mdi mdi-settings text-primary"></i>Settings</a>
                    </ul> --}}
                    {{-- <ul>
                        <hr class="dropdown-divider">
                    </ul> --}}
                    {{-- <form action="/logout" method="post"> --}}
                    {{-- @csrf --}}
                    <ul class="dropdown-item">
                        <a class="nav-link" href="{{ url('logout') }}" role="button">
                            {{-- <button type="submit" class="dropdown-item"> --}}
                            <i class="mdi mdi-logout text-primary"></i>Logout
                        </a>
                    </ul>
                    {{-- </button> --}}
                    {{-- </form> --}}
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
