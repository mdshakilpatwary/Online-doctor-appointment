<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ Auth::user()->getRoleNames()[0] }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Appointments
    </div>
    <!-- Nav Item - Community forum -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.active_appointment')}}">

            <span><i class="fa-solid fa-calendar-check"></i> Active Patient Appointments</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.past_appointment') }}">

            <span><i class="fa-solid fa-hourglass"></i> Past Appointments</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Doctor Schedules
    </div>
    <!-- Nav Item - Community forum -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.active_schedule')}}">

            <span><i class="fa-solid fa-calendar-check"></i> Doctor Appointment Schedules</span></a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.past_appointment') }}">

            <span><i class="fa-solid fa-hourglass"></i> Past Appointments</span></a>
    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    {{-- user management  --}}
    <div class="sidebar-heading">
        Users
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <span>Manage User</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Counselor</h6>
                <a class="collapse-item" href="{{route('admin.pending_user')}}"><i class="fa-solid fa-hourglass-end"></i> Pending Experts</a>
                <a class="collapse-item" href="{{route('admin.blocked_user')}}"><i class="fa-solid fa-ban"></i> Blocked User</a>
                <a class="collapse-item" href="{{route('admin.doctor_list')}}"><i class="fa-solid fa-user-doctor"></i> Doctors</a>
                <a class="collapse-item" href="{{route('admin.counselor_list')}}"><i class="fa-solid fa-headset"></i> Counselors</a>
                <a class="collapse-item" href="{{route('admin.patient_list')}}"><i class="fa-solid fa-bed-pulse"></i> Patients</a>
                <a class="collapse-item" href="{{route('admin.all_users')}}"><i class="fa-solid fa-user-group"></i> All User</a>

            </div>
        </div>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Community
    </div>
    <!-- Nav Item - Community forum -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.community.index', ['community' => 'admin']) }}">
            <i class="fa-solid fa-users"></i>
            <span>Community Forum</span></a>
    </li>




    <!-- Heading -->
    <div class="sidebar-heading">
        Notifications and Messages
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.contact_us_queries') }}">
            <i class="fa-solid fa-envelope"></i>
            <span>Contact Us Query</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
