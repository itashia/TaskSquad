<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">میزکار راییوم</div>
    <div style="width: 250px">
        <figure class="text-center">
            @if(auth()->user()->pic)
                <img src="{{ asset('storage/'. auth()->user()->pic) }}" class="img-fluid rounded-4">
            @else
                <p>عکسی موجود نیست</p>
            @endif
        </figure>
        <div class="text-center">
            <span class="badge text-bg-primary rounded-5"><i class="fa-duotone fa-user"></i>  {{ auth()->user()->name }}</span>
            <span class="badge text-bg-success rounded-5">
                <i class="fa-duotone fa-lock"></i> {{ auth()->user()->roles->first()->value ?? 'دسترسی تعریف نشده است' }}
            </span>
        </div>
        <div class="p-3">
            <div class="text-center">
                <a href="{{ route('profile.index', auth()->user()->id) }}" type="button" class="btn btn-danger rounded-5 btn-sm"><i class="fa-duotone fa-gear"></i> پروفایل </a>
                <a href="{{ route('admin.logout') }}" type="button" class="btn btn-danger rounded-5 btn-sm"><i class="fa-duotone fa-sign-out"></i> خروج</a>
            </div>
            <div class="d-grid gap-2 mt-5">

                <a href="{{route('admin.index')}}" type="button" class="btn {{ request()->routeIs('admin.index') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-home"></i> پیشخوان </a>
                @can('users_index')
                    <a href="{{ route('users.index') }}" type="button" class="btn {{ request()->routeIs('users.index') || request()->routeIs('users.create') || request()->routeIs('users.edit') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-users"></i> کاربران </a>
                @endcan
                @can('groups_index')
                    <a href="{{ route('groups.index') }}" type="button" class="btn {{ request()->routeIs('groups.index') || request()->routeIs('groups.create') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-user-group"></i> گروه ها </a>
                @endcan
                @can('roles_index')
                    <a href="{{ route('roles.index') }}" type="button" class="btn {{ request()->routeIs('roles.index') || request()->routeIs('roles.create') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-tower-control"></i> مقام ها </a>
                @endcan
                @can('permissions_index')
                    <a href="{{ route('permissions.index') }}" type="button" class="btn {{ request()->routeIs('permissions.index') || request()->routeIs('permissions.create') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-lock"></i> دسترسی ها </a>
                @endcan
                @can('tasks_index')
                    <a href="{{ route('tasks.index') }}" type="button" class="btn {{ request()->routeIs('tasks.index') || request()->routeIs('tasks.create') || request()->routeIs('tasks.show') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-tasks"></i> وظیفه ها </a>
                @endcan
                @can('projects_index')
                    <a href="{{ route('projects.index') }}" type="button" class="btn {{ request()->routeIs('projects.index') || request()->routeIs('projects.create') || request()->routeIs('projects.show') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-file-archive"></i> پروژه ها </a>
                @endcan
            </div>

        </div>
    </div>
</div>
<!-- /#sidebar-wrapper -->
