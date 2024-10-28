<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-light">
            <span class="logo-lg">
                {{-- <img src="{{ URL::asset('images/logos/logo.png') }}" height="40"> --}}
                <h3 class="text-white">Monday Club</h3>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/dashboard') || request()->is('user/dashboard/*') ? 'active' : '' }}"
                        href="{{ route('user.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i> <span>Dashboard</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/videos') || request()->is('user/videos/*') ? 'active' : '' }}"
                        href="{{ route('user.videos.index') }}">
                        <i class="mdi mdi-video-outline"></i> <span>Videos</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/contacts') || request()->is('user/contacts/*') ? 'active' : '' }}"
                        href="{{ route('user.contacts.index') }}">
                        <i class="mdi mdi-account-multiple-outline"></i> <span>Contacts</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/documents') || request()->is('user/documents/*') ? 'active' : '' }}"
                        href="{{ route('user.documents.index') }}">
                        <i class="mdi mdi-file-document-outline"></i> <span>Manage Documents</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/emails') || request()->is('user/emails/*') ? 'active' : '' }}"
                        href="{{ route('user.emails.index') }}">
                        <i class="mdi mdi-email-outline"></i> <span>Sent Emails</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
