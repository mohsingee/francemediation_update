<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('dashboard') }}" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="{{ asset('assets/images/'.$favicon->logo) }}" alt="" width="80">
        </span>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      @if (Auth::user()->role == '1')
      <!-- Users -->
      <li class="menu-item {{ Route::is('user.index') ? 'active' : '' }}">
        <a href="{{ route('user.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-user'></i>
          <div data-i18n="Analytics">Users</div>
        </a>
      </li>
      <!-- Form Submission -->
      <li class="menu-item {{ Route::is('formation.index') ? 'active' : '' }}">
        <a href="{{ route('formation.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Form Submission</div>
        </a>
      </li>
      <!-- Mediator Submissions -->
      <li class="menu-item {{ Route::is('mediator.index') ? 'active' : '' }}">
        <a href="{{ route('mediator.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Mediator Submissions</div>
        </a>
      </li>
      <!-- Blogs -->
      <li class="menu-item {{ Route::is('blogs.index') ? 'active' : '' }}">
        <a href="{{ route('blogs.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Blogs</div>
        </a>
      </li>
      <!-- Instructor -->
      <li class="menu-item {{ Route::is('instructor.index') ? 'active' : '' }}">
        <a href="{{ route('instructor.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Instructor</div>
        </a>
      </li>
      <!-- Categories -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Categories</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('categories.index') }}" class="menu-link">
              <div data-i18n="Account">Category</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('sub_categories.index') }}" class="menu-link">
              <div data-i18n="Notifications">Sub Category</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Courses -->
      <li class="menu-item {{ Route::is('courses.index') ? 'active' : '' }}">
        <a href="{{ route('courses.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Courses</div>
        </a>
      </li>
      <!-- Events -->
      <li class="menu-item {{ Route::is('events.index') ? 'active' : '' }}">
        <a href="{{ route('events.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Events</div>
        </a>
      </li>
       <!-- Settings -->
       <li class="menu-item {{ Route::is('setting.index') ? 'active' : '' }}">
        <a href="{{ route('setting.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">General Settings</div>
        </a>
      </li>
      @endif
    </ul>
  </aside>