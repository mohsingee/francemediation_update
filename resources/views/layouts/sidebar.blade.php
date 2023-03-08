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
      <li class="menu-item @if(Route::is('user.index')) active @elseif(Route::is('user.create')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Account Settings">Users</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('user.index') }}" class="menu-link">
              <div data-i18n="Account">All User</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('user.create') }}" class="menu-link">
              <div data-i18n="Notifications">Add User</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Form Submission -->
      <li class="menu-item {{ Route::is('formation.index') ? 'active' : '' }}">
        <a href="{{ route('formation.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Formations</div>
        </a>
      </li>
      <!-- Mediator Submissions -->
      <li class="menu-item {{ Route::is('mediator.index') ? 'active' : '' }}">
        <a href="{{ route('mediator.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Mediations</div>
        </a>
      </li>
      <!-- Blogs -->
      <li class="menu-item @if(Route::is('blogs.index')) active @elseif(Route::is('blogs.create')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Account Settings">Blogs</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('blogs.index') }}" class="menu-link">
              <div data-i18n="Account">All Blog</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('blogs.create') }}" class="menu-link">
              <div data-i18n="Notifications">Add Blog</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Instructor -->
      <li class="menu-item @if(Route::is('instructor.index')) active @elseif(Route::is('instructor.create')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Account Settings">Instructors</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('instructor.index') }}" class="menu-link">
              <div data-i18n="Account">All Instructor</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('instructor.create') }}" class="menu-link">
              <div data-i18n="Notifications">Add Instructor</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Categories -->
      <li class="menu-item @if(Route::is('categories.index')) active @elseif(Route::is('categories.create')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Account Settings">Categories</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('categories.index') }}" class="menu-link">
              <div data-i18n="Account">All Category</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('categories.create') }}" class="menu-link">
              <div data-i18n="Notifications">Add Category</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Sub Categories -->
      <li class="menu-item @if(Route::is('sub_categories.index')) active @elseif(Route::is('sub_categories.create')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Account Settings">SubCategory</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('sub_categories.index') }}" class="menu-link">
              <div data-i18n="Account">All SubCategory</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('sub_categories.create') }}" class="menu-link">
              <div data-i18n="Notifications">Add SubCategory</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Courses -->
      <li class="menu-item @if(Route::is('courses.index')) active @elseif(Route::is('courses.create')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Account Settings">Courses</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('courses.index') }}" class="menu-link">
              <div data-i18n="Account">All Course</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('courses.create') }}" class="menu-link">
              <div data-i18n="Notifications">Add Course</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Events -->
      <li class="menu-item @if(Route::is('events.index')) active @elseif(Route::is('events.create')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Account Settings">Events</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('events.index') }}" class="menu-link">
              <div data-i18n="Account">All Events</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('events.create') }}" class="menu-link">
              <div data-i18n="Notifications">Add Events</div>
            </a>
          </li>
        </ul>
      </li>
       <!-- Settings -->
       <li class="menu-item {{ Route::is('setting.index') ? 'active' : '' }}">
        <a href="{{ route('setting.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">General Settings</div>
        </a>
      </li>
      @elseif(Auth::user()->role == '0')
      <!-- Selected courses -->
      <li class="menu-item @if(Route::is('user-course.index')) active @endif">
        <a href="{{ route('user-course.index') }}" class="menu-link">
          <i class='menu-icon tf-icons bx bx-detail'></i>
          <div data-i18n="Analytics">Find Courses</div>
        </a>
      </li>
      @endif
    </ul>
  </aside>