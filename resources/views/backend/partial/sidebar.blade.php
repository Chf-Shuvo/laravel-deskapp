<div class="left-side-bar">
    {{-- logo --}}
    <div class="brand-logo ml-5">
        <a href="{{ route('home') }}">
            <img src="{{ asset('backend/src/images/baiust_logo.png') }}" height="80" width="50" class="dark-logo ml-5">
            <img src="{{ asset('backend/src/images/baiust_logo.png') }}" height="80" width="50" class="light-logo ml-5">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    {{-- logo ends --}}

    {{-- menu starts --}}
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                {{-- super-admin --}}
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('user-profile.index') }}">Users</a></li>
                        <li><a href="{{ route('permission.index') }}">Access Control List</a></li>
                        <li><a href="{{ route('audit.index') }}">Check Audtis</a></li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Calendar</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
            </ul>
        </div>
    </div>
    {{-- menu ends --}}
</div>
<div class="mobile-menu-overlay"></div>