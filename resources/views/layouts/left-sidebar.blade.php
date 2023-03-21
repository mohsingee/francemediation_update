<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="{{ asset('assets/images/'.$favicon->logo) }}" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    @if (Auth::user()->role == '1')
                    <a class="image" href="{{ route('admin.profile') }}"><img src="{{ asset('assets/images/' . auth()->user()->image) }}" alt="User"></a>
                    @else
                    <img src="{{ asset('assets/images/user.png') }}" alt="User">
                    @endif
                    <div class="detail">
                        <h4>{{ Auth::user()->firstname }}</h4>
                        {{-- <small>Super Admin</small>                         --}}
                    </div>
                </div>
            </li>
            <li class="{{ Route::is('dashboard') ? 'active' : '' }} open"><a href="{{ route('dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            @if (Auth::user()->role == '1')
            <li class="@if(Route::is('user.index')) active @elseif(Route::is('user.create')) active @endif"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('user.create') }}">Add User</a></li>
                    <li><a href="{{ route('user.index') }}">View Users</a></li>               
                </ul>
            </li>
            <li class="{{ Route::is('formation.index') ? 'active' : '' }} open"><a href="{{ route('formation.index') }}"><i class="zmdi zmdi-home"></i><span>Formations</span></a></li>
            <li class="{{ Route::is('mediator.index') ? 'active' : '' }} open"><a href="{{ route('mediator.index') }}"><i class="zmdi zmdi-home"></i><span>Mediations</span></a></li>
            <li class="@if(Route::is('blogs.index')) active @elseif(Route::is('blogs.create')) active @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Blogs</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('blogs.create') }}">Add Blog</a></li>
                    <li><a href="{{ route('blogs.index') }}">View Blogs</a></li>   
                </ul>
            </li>
            <li class="@if(Route::is('instructor.index')) active @elseif(Route::is('instructor.create')) active @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Instructors</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('instructor.create') }}">Add Instructor</a></li>
                    <li><a href="{{ route('instructor.index') }}">View Instructors</a></li>   
                </ul>
            </li>
            <li class="@if(Route::is('categories.index')) active @elseif(Route::is('categories.create')) active @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Categories</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('categories.create') }}">Add Category</a></li>
                    <li><a href="{{ route('categories.index') }}">View Categories</a></li>   
                </ul>
            </li>
            <li class="@if(Route::is('sub_categories.index')) active @elseif(Route::is('sub_categories.create')) active @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Sub Categories</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('sub_categories.create') }}">Add Sub Category</a></li>
                    <li><a href="{{ route('sub_categories.index') }}">View Sub Categories</a></li>   
                </ul>
            </li>
            <li class="@if(Route::is('courses.index')) active @elseif(Route::is('courses.create')) active @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-folder"></i><span>Courses</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('courses.create') }}">Add Course</a></li>
                    <li><a href="{{ route('courses.index') }}">View Courses</a></li>
                </ul>
            </li>
            <li class="@if(Route::is('events.index')) active @elseif(Route::is('events.create')) active @endif"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Events</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('events.create') }}">Add Event</a></li>
                    <li><a href="{{ route('events.index') }}">View Events</a></li>
                </ul>
            </li>
            <li class="{{ Route::is('setting.index') ? 'active' : '' }} open"><a href="{{ route('setting.index') }}"><i class="zmdi zmdi-home"></i><span>General Settings</span></a></li>
            @elseif(Auth::user()->role == '0')
            <li class="@if(Route::is('user-course.index')) active @endif open"><a href="{{ route('user-course.index') }}"><i class="zmdi zmdi-home"></i><span>Find Courses</span></a></li>
            @endif
        </ul>
    </div>
</aside>