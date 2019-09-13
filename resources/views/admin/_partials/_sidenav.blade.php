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
            @can('isAdmin', Auth::user())
                <div class="user">
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
                    <li class="nav-item {{ setSideBarActive(['dashboard/group/action*'],'active') }}">
                        <a class="nav-link" data-toggle="collapse" href="#groupAction" aria-expanded="{{ setSideBarActive(['dashboard/group/action*'],'true') }}">
                            <i class="fas fa-bars"></i>
                            <p> Group action
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse {{ setSideBarActive(['dashboard/group/action*'],'show active') }}" id="groupAction">
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
                </div>
            @endcan

            <!-- Manga & Trademark registered lists -->
            <div class="user">
                <li class="nav-item {{ setSideBarActive(['dashboard/manga'],'active') }}">
                    <a class="nav-link" href="{{route('manga.index')}}">
                        <span class="sidebar-mini">
                            <i class="far fa-registered"></i>
                        </span>
                        <span class="sidebar-normal"> 
                            <p> Registered Manga Lists </p> 
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ setSideBarActive(['dashboard/manga/action*'],'active') }}">
                    <a class="nav-link" data-toggle="collapse" href="#mangaAction" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                        <p> Manga action
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse {{ setSideBarActive(['dashboard/manga/action*'],'show active') }}" id="mangaAction">
                        <ul class="nav">
                            <li class="nav-item {{ setSideBarActive(['dashboard/manga/action/create'],'active') }}">
                                <a class="nav-link" href="{{route('manga.action.create')}}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-plus-circle"></i> 
                                    </span>
                                    <span class="sidebar-normal"> Add new manga </span>
                                </a>
                            </li>
                            <li class="nav-item {{ setSideBarActive(['dashboard/manga/action/trade_mark/create'],'active') }}">
                                <a class="nav-link" href="{{route('manga.action.create.trade_mark')}}">
                                    <span class="sidebar-mini">
                                        <i class="fas fa-copyright"></i> 
                                    </span>
                                    <span class="sidebar-normal"> Add new copyright </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </div>
            <!-- User & permission management -->
            @can('isAdmin', Auth::user())
                <div class="user">
                    <li class="nav-item {{ setSideBarActive(['dashboard/user*'],'active') }}">
                        <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="{{ setSideBarActive(['dashboard/user*'],'true') }}">
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
                                <li class="nav-item {{ setSideBarActive(['dashboard/user/create'],'active') }} ">
                                    <a class="nav-link" href="{{ route('user.create') }}">
                                        <span class="sidebar-mini">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span class="sidebar-normal"> Add new user </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ setSideBarActive(['dashboard/permission*'],'active') }} ">
                        <a class="nav-link" data-toggle="collapse" href="#permission" aria-expanded="{{ setSideBarActive(['dashboard/permission*'],'true') }}">
                            <i class="fas fa-universal-access"></i>
                            <p> Permission
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse {{ setSideBarActive(['dashboard/permission*'],'show active') }}" id="permission">
                            <ul class="nav">
                                <li class="nav-item {{ setSideBarActive(['dashboard/permission/create'],'active') }} ">
                                    <a class="nav-link" href="{{ route('permission.create') }}">
                                        <span class="sidebar-mini">
                                            <i class="fas fa-plus-circle"></i>
                                        </span>
                                        <span class="sidebar-normal"> Add new role </span>
                                    </a>
                                </li>
                                <li class="nav-item {{ setSideBarActive(['dashboard/permission','dashboard/permission/*/edit'],'active') }}">
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
                </div>
            @endcan
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                    <i class="material-icons">grid_on</i>
                    <p> Tables
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/regular.html">
                                <span class="sidebar-mini"> RT </span>
                                <span class="sidebar-normal"> Regular Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/extended.html">
                                <span class="sidebar-mini"> ET </span>
                                <span class="sidebar-normal"> Extended Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/datatables.net.html">
                                <span class="sidebar-mini"> DT </span>
                                <span class="sidebar-normal"> DataTables.net </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                    <i class="material-icons">place</i>
                    <p> Maps
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/maps/google.html">
                                <span class="sidebar-mini"> GM </span>
                                <span class="sidebar-normal"> Google Maps </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/maps/fullscreen.html">
                                <span class="sidebar-mini"> FSM </span>
                                <span class="sidebar-normal"> Full Screen Map </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/maps/vector.html">
                                <span class="sidebar-mini"> VM </span>
                                <span class="sidebar-normal"> Vector Map </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/widgets.html">
                    <i class="fas fa-cogs"></i>
                    <p> Settings </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/charts.html">
                    <i class="material-icons">timeline</i>
                    <p> Charts </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/calendar.html">
                    <i class="material-icons">date_range</i>
                    <p> Calendar </p>
                </a>
            </li>
        </ul>
    </div>
</div>