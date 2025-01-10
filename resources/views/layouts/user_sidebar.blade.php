<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-light" style="width:200px;">
            <img src="{{ URL::asset('images/logos/logo-large.png') }}" class="logo-large" style="width:100%; height: 100%; object-fit:cover;" alt="Logo">
            <img src="{{ URL::asset('images/logos/logo-small.png') }}" class="logo-small" style="width:100%; height: 100%; object-fit:cover; display: none;" alt="Logo">
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/dashboard') || request()->is('user/dashboard/*') ? 'active' : '' }}"
                        href="{{ route('user.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i> <span>Home</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/videos') || request()->is('user/videos/*') ? 'active' : '' }}"
                        href="{{ route('user.videos.categories') }}">
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
                        href="{{ route('user.sent_emails.index') }}">
                        <i class="mdi mdi-email-outline"></i> <span>Sent Emails</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('user/donations') || request()->is('user/donations/*') ? 'active' : '' }}"
                        href="{{ route('user.donations.index') }}">
                        <i class="mdi mdi-heart-outline"></i> <span>Sponsors</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>

