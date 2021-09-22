<ul class="sidebar-menu">
    <li class="header"><strong>Master</strong></li>
    <li class="treeview"><a href="{{route('admin.dashboard')}}">
        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
    </a>
    <li class="treeview"><a href="#">
            <i class="icon icon icon-package blue-text s-18"></i>
            <span>Tamu</span><i class="icon icon-angle-left s-18 pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('guest.index') }}"><i class="icon icon-circle-o"></i>Data Tamu</a>
            </li>
            <li><a href="#"><i class="icon icon-add"></i>Add New </a>
            </li>
        </ul>
    </li>
    <li class="header light mt-3"><strong>Settings</strong></li>
    <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Users<i
                class="icon icon-angle-left s-18 pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{ route('user.index') }}"><i class="icon icon-circle-o"></i>All Users</a>
            </li>
            <li><a href="#"><i class="icon icon-add"></i>Add User</a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="icon icon-sign-out purple-text s-18"></i> <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
