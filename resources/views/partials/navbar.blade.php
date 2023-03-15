
@if (strtolower(session('auth.user_type')) == 'super_admin')
    <nav class="sb-topnav navbar navbar-expand navbar-primary bg-indigo-800 shadow-sm " name="11">
        <!-- Navbar Brand-->
        <a class="navbar-brand text-light ps-3" href="">Admin Panel</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link  btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars text-light"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group d-none">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" id="navbarDropdown1" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown1">
                    <li><a class="dropdown-item " href="#!">Profile</a></li>
                    <li><a class="dropdown-item " href="{{ route('logout') }}">logout</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li></li>
                </ul>
            </li>
        </ul>
    </nav>
@elseif (strtolower(session('auth.user_type')) == 'student')
    <nav class="sb-topnav navbar navbar-expand navbar-dark shadow-sm bg-gray-800 " name="22">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">{{ session('auth.name') }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link  btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars text-white"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group d-none">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item "
                            href="{{ route('student.profile', session('auth.id')) }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li></li>
                </ul>
            </li>
        </ul>
    </nav>
@else
 <div class="d-flex align-items-center justify-center"><a href="{{ route('login') }}"> Log In</a></div>

@endif
