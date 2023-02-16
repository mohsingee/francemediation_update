<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
    >
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input
            type="text"
            class="form-control border-0 shadow-none"
            placeholder="Search..."
            aria-label="Search..."
            />
        </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    @if (Auth::user()->role == '1')
                        <img src="{{ asset('assets/images/' . auth()->user()->image) }}" class="w-px-40 h-auto rounded-circle"/>
                    @else
                    <img src="{{ asset('assets/images/user.png') }}" class="w-px-40 h-auto rounded-circle"/>
                    @endif
                </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            @if (Auth::user()->role == '1')
                                <img src="{{ asset('assets/images/' . auth()->user()->image) }}" class="w-px-40 h-auto rounded-circle"/>
                            @else
                                <img src="{{ asset('assets/images/user.png') }}" class="w-px-40 h-auto rounded-circle"/>
                            @endif
                        </div>
                        </div>
                        <div class="flex-grow-1">
                        <span class="fw-semibold d-block">{{ Auth::user()->firstname }}
                            {{ Auth::user()->lastname }}</span>
                        </div>
                    </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                @if (Auth::user()->login_type == '1')
                <li>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                    <i class="bx bx-user me-2"></i>
                    <span class="align-middle">My Profile</span>
                    </a>
                </li>
                    @if (Auth::user()->role != '1')
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.change_password') }}">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Change Password</span>
                        </a>
                    </li>
                    @endif
                @endif
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </form>
                </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
