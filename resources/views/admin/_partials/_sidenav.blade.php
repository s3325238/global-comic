<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-mini">
            GC
        </a>
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            Global Comics
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('img/upload/avatar/').'/'. Auth::user()->avatar }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inbox') }}">
                                <span class="sidebar-mini"> <i class="fas fa-envelope"></i> </span>
                                <span class="sidebar-normal"> Mail </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> <i class="fas fa-address-card"></i> </span>
                                <span class="sidebar-normal"> Profile Page </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <span class="sidebar-mini">
                                    <i class="material-icons">logout</i>
                                </span>
                                <span class="sidebar-normal"> Logout </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <div class="user">
                <li class="nav-item {{ setSideBarActive(['dashboard'],'active') }} ">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item {{ setSideBarActive(['dashboard/task'],'active') }}">
                    <a class="nav-link" href="{{ route('task.index') }}">
                        <i class="fas fa-tasks"></i>
                        <p> Tasks Management </p>
                    </a>
                </li>
            </div>
            <!-- Group Management -->
            <div class="user">
                @can('only-leader', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/video/pending'],'active') }}">
                    <a class="nav-link" href="{{route('video.pending')}}">
                        <span class="sidebar-mini">
                            <i class="fas fa-pause-circle"></i>
                        </span>
                        <span class="sidebar-normal">
                            <p> Pending video&nbsp;&nbsp;
                                @if (count(get_pending_video(Auth::id())) > 0)
                                    <span class="badge badge-pill badge-info">
                                        {{ count(get_pending_video(Auth::id())) }}
                                    </span>
                                @endif
                            </p>
                        </span>
                    </a>
                </li>
                @endcan
                @can('leader-member', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/video/create'],'active') }}">
                    <a class="nav-link" href="{{route('video.create')}}">
                        <span class="sidebar-mini">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="sidebar-normal">
                            <p> Upload new video </p>
                        </span>
                    </a>
                </li>
                @endcan
                @can('view-group', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/group', 'dashboard/group/*/edit'],'active') }}">
                    <a class="nav-link" href="{{ route('group.index') }}">
                        <span class="sidebar-mini">
                            <i class="fas fa-list-alt"></i>
                        </span>
                        <span class="sidebar-normal">
                            <p> Group Lists </p>
                        </span>
                    </a>
                </li>
                @endcan
                @can('create-group', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/group/action*'],'active') }}">
                    <a class="nav-link" data-toggle="collapse" href="#groupAction"
                        aria-expanded="{{ setSideBarActive(['dashboard/group/action*'],'true') }}">
                        <i class="fas fa-bars"></i>
                        <p> Group action
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ setSideBarActive(['dashboard/group/action*'],'show active') }}"
                        id="groupAction">
                        <ul class="nav">
                            <li class="nav-item {{ setSideBarActive(['dashboard/group/action/create'],'active') }}">
                                <a class="nav-link" href="{{ route('group.action.create') }}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="sidebar-normal"> Add new group </span>
                                </a>
                            </li>
                            <li class="nav-item  {{ setSideBarActive(['dashboard/group/action/leader'],'active') }}">
                                <a class="nav-link" href="{{ route('group.leader') }}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-user-graduate"></i>
                                    </span>
                                    <span class="sidebar-normal"> Add new leader </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
            </div>

            <!-- Manga & Trademark registered lists -->
            <div class="user">
                @can('only-leader', Auth::user())
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <span class="sidebar-mini">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="sidebar-normal">
                            <p> Manga Lists </p>
                        </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <span class="sidebar-mini">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="sidebar-normal">
                            <p> Upload new chapter </p>
                        </span>
                    </a>
                </li>
                @endcan
                @can('view-manga', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/manga'],'active') }}">
                    <a class="nav-link" href="{{route('manga.index')}}">
                        <span class="sidebar-mini">
                            <i class="material-icons">event_available</i>
                        </span>
                        <span class="sidebar-normal">
                            <p> Available Manga Lists </p>
                        </span>
                    </a>
                </li>
                @endcan
                @can('access-copyright', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/manga/copyright'],'active') }}">
                    <a class="nav-link" href="{{route('manga.copyright')}}">
                        <span class="sidebar-mini">
                            <i class="fas fa-copyright"></i>
                        </span>
                        <span class="sidebar-normal">
                            <p> Copyright Lists </p>
                        </span>
                    </a>
                </li>
                @endcan
                @can('create-manga', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/manga/action*'],'active') }}">
                    <a class="nav-link" data-toggle="collapse" href="#mangaAction" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                        <p> Manga action
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ setSideBarActive(['dashboard/manga/action*'],'show active') }}"
                        id="mangaAction">
                        <ul class="nav">
                            <li class="nav-item {{ setSideBarActive(['dashboard/manga/action/create'],'active') }}">
                                <a class="nav-link" href="{{route('manga.action.create')}}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="sidebar-normal"> Add new manga </span>
                                </a>
                            </li>
                            @can('access-copyright', Auth::user())
                            <li
                                class="nav-item {{ setSideBarActive(['dashboard/manga/action/trade_mark/create'],'active') }}">
                                <a class="nav-link" href="{{route('manga.action.create.trade_mark')}}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-copyright"></i>
                                    </span>
                                    <span class="sidebar-normal"> Add new copyright </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan
            </div>
            <!-- User & permission management -->
            {{-- @can('isAdmin', Auth::user()) --}}
            <div class="user">
                @can('only-leader', Auth::user())
                <li class="nav-item  {{ setSideBarActive(['dashboard/member'],'active') }}">
                    <a class="nav-link" href="{{route('member.index')}}">
                        {{-- {{ setSideBarActive(['dashboard/user'],'active') }} --}}
                        {{-- {{ route('user.index') }} --}}
                        <span class="sidebar-mini">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="sidebar-normal"> Member Lists </span>
                    </a>
                </li>
                <li class="nav-item {{ setSideBarActive(['dashboard/member/create'],'active') }}">
                    <a class="nav-link" href="{{route('member.create')}}">
                        <span class="sidebar-mini">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="sidebar-normal"> Add new member </span>
                    </a>
                </li>
                @endcan
                @can('view-user', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/user*'],'active') }}">
                    <a class="nav-link" data-toggle="collapse" href="#users"
                        aria-expanded="{{ setSideBarActive(['dashboard/user*'],'true') }}">
                        <i class="fas fa-users"></i>
                        <p> User Management
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ setSideBarActive(['dashboard/user*'],'show active') }}" id="users">
                        <ul class="nav">
                            <li class="nav-item {{ setSideBarActive(['dashboard/user'],'active') }} ">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                    <span class="sidebar-normal"> Normal User Lists </span>
                                </a>
                            </li>
                            @can('edit-all', Auth::user())
                            <li class="nav-item  ">
                                <a class="nav-link" href="#">
                                    {{-- {{ setSideBarActive(['dashboard/user'],'active') }} --}}
                                    {{-- {{ route('user.index') }} --}}
                                    <span class="sidebar-mini">
                                        <i class="fas fa-user-shield"></i>
                                    </span>
                                    <span class="sidebar-normal"> Group Lead </span>
                                </a>
                            </li>
                            @endcan

                            @can('create-user', Auth::user())
                            <li class="nav-item {{ setSideBarActive(['dashboard/user/create'],'active') }} ">
                                <a class="nav-link" href="{{ route('user.create') }}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span class="sidebar-normal"> Add new user </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan
                @can('edit-all', Auth::user())
                <li class="nav-item {{ setSideBarActive(['dashboard/permission*'],'active') }} ">
                    <a class="nav-link" data-toggle="collapse" href="#permission"
                        aria-expanded="{{ setSideBarActive(['dashboard/permission*'],'true') }}">
                        <i class="fas fa-universal-access"></i>
                        <p> Permission
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ setSideBarActive(['dashboard/permission*'],'show active') }}"
                        id="permission">
                        <ul class="nav">
                            <li class="nav-item {{ setSideBarActive(['dashboard/permission/create'],'active') }} ">
                                <a class="nav-link" href="{{ route('permission.create') }}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="sidebar-normal"> Add new role </span>
                                </a>
                            </li>

                            <li
                                class="nav-item {{ setSideBarActive(['dashboard/permission','dashboard/permission/*/edit'],'active') }}">
                                <a class="nav-link" href="{{ route('permission.index') }}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-list-alt"></i>
                                    </span>
                                    <span class="sidebar-normal"> Role Lists </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
            </div>
            {{-- @endcan --}}
            @can('edit-all', Auth::user())
            <li class="nav-item {{ setSideBarActive(['dashboard/logs*'],'active') }}">
                <a class="nav-link" href="{{route('logs.index')}}">
                    <i class="fas fa-history"></i>
                    <p> Activity Logs </p>
                </a>
            </li>
            @endcan
            @can('change-settings', Auth::user())
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="fas fa-cogs"></i>
                    <p> Settings </p>
                </a>
            </li>
            @endcan
            @can('only-leader', Auth::user())
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="fab fa-wpforms"></i>
                    <p> Applicant List </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="fas fa-network-wired"></i>
                    <p> New recruitment </p>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</div>