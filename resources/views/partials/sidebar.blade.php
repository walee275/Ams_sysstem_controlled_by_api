@if (strtolower(session('auth.user_type')) == 'super_admin')

<nav class="sb-sidenav accordion sb-sidenav-dark bg-indigo-800 shadow-sm" id="sidenavAccordion" name="11">
    <div class="sb-sidenav-menu ">
        <div class="nav ">
             {{-- <a class="nav-link text-light btn-outline-info mt-4" id="" href="{{ route('fetch_company_users', $company) }}">
                <div class="sb-nav-link-icon" ><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a> --}}
            <a class="nav-link text-light btn-outline-info" href="{{ route('fetch_companies', $company) }}">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Companies
            </a>

            <a class="nav-link text-light btn-outline-info" href="{{ route('students.attendance') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Students Attendance
            </a>

            <a class="nav-link text-light btn-outline-info" href="{{ route('single.student.attendances') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Single Student Attendance Report
            </a>

            <a class="nav-link text-light btn-outline-info" href="{{ route('students.leave.requests') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Students Leave Requests
            </a>
{{--

            <a class="nav-link text-light btn-outline-info" href="{{ route('admin.companies') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Companies
            </a> --}}
        </div>
    </div>
    <div class="sb-sidenav-footer bg-transparent text-center text-dark">
        <div class="small">Logged in as:</div>
        <h5>{{ session('auth.name') }}</h5>
    </div>
</nav>

@elseif (strtolower(session('auth.user_type')) == 'student')

<nav class="sb-sidenav accordion sb-sidenav-dark shadow bg-gray-800" id="sidenavAccordion" name="22">
    <div class="sb-sidenav-menu ">
        <div class="nav ">
            <a class="nav-link text-white" href="{{ route('fetch_company_users', $company) }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            {{-- <a class="nav-link text-dark" href="{{ route('student.attendance') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Attendance
            </a> --}}

        </div>
    </div>
    <div class="sb-sidenav-footer bg-transparent text-center text-muted">
        <div class="small">Logged in as:</div>
        <h5>{{ session('auth.name') }}</h5>
    </div>
</nav>

@endif
