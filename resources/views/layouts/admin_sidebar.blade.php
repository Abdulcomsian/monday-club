<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-light" style="width:200px">
            <img src="{{ URL::asset('images/logos/logo-large.png') }}" class="logo-large" style="width:100%; height: 100%; object-fit:cover;" alt="Logo">
            <img src="{{ URL::asset('images/logos/logosmall.png') }}" class="logo-small" style="width:100%; height: 100%; object-fit:cover; display: none;" alt="Logo">
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
                    <a class="nav-link menu-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i> <span>Home</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}"
                        href="{{ route('admin.categories.index') }}">
                        <i class="mdi mdi-folder-outline"></i> <span>Categories</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/videos') || request()->is('admin/videos/*') ? 'active' : '' }}"
                        href="{{ route('admin.videos.index') }}">
                        <i class="mdi mdi-video-outline"></i> <span>Videos</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/contacts') || request()->is('admin/contacts/*') ? 'active' : '' }}"
                        href="{{ route('admin.contacts.index') }}">
                        <i class="mdi mdi-account-multiple-outline"></i> <span>Contacts</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/documents') || request()->is('admin/documents/*') ? 'active' : '' }}"
                        href="{{ route('admin.documents.index') }}">
                        <i class="mdi mdi-file-document-outline"></i> <span>Documents</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/emails') || request()->is('admin/emails/*') ? 'active' : '' }}"
                        href="{{ route('admin.emails.index') }}">
                        <i class="mdi mdi-file-document-outline"></i> <span>Emails</span>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/donations') || request()->is('admin/donations/*') ? 'active' : '' }}"
                        href="{{ route('admin.donations.index') }}">
                        <i class="mdi mdi-heart-outline"></i> <span>Sponsors</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
