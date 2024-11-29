<nav class="sb-sidenav accordion sb-sidenav-dark bg-gray-800" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Elections</div>
            <a class="nav-link" href="{{ url('/elections') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-sliders"></i></div>
                Election Management
            </a>

            <a class="nav-link" href="{{ url('/admin/election_monitoring') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-check-to-slot"></i></div>
                Election Monitoring
            </a>

            <a class="nav-link" href="{{ url('/admin/voter_management') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-users-line"></i></div>
                Voter Management
            </a>

            <a class="nav-link" href="{{ url('/admin/charts') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-area"></i></div>
                Charts
            </a>

            <div class="sb-sidenav-menu-heading">Support and Maintenance</div>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-headset"></i></div>
                Support
            </a>
            <a class="nav-link" href="{{ url('/profile/edit') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                Account
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>
