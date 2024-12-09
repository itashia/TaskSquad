<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">میزکار راییوم</div>
    <div style="width: 250px">
        <figure class="text-center">
            <img src="" class="img-fluid rounded-5" alt="" style="width: 80px; margin: 10px auto; border-radius: 15px">
        </figure>
        <div class="text-center">
            <span class="badge text-bg-primary rounded-5"><i class="fa-duotone fa-user"></i>  </span>
            <span class="badge text-bg-success rounded-5">
                <i class="fa-duotone fa-lock"></i>

            </span>
        </div>
        <div class="p-3">
            <div class="text-center">
                <a href="" type="button" class="btn btn-danger rounded-5 btn-sm"><i class="fa-duotone fa-gear"></i> پروفایل </a>
                <a href="" type="button" class="btn btn-danger rounded-5 btn-sm"><i class="fa-duotone fa-sign-out"></i> خروج</a>
            </div>
            <div class="d-grid gap-2 mt-5">
                <a href="{{route('admin.index')}}" type="button" class="btn {{ request()->routeIs('admin.index') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-home"></i> پیشخوان </a>
                <a href="{{ route('users.index') }}" type="button" class="btn {{ request()->routeIs('users.index') || request()->routeIs('users.create') || request()->routeIs('users.edit') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-users"></i> کاربران </a>
                <a href="{{ route('groups.index') }}" type="button" class="btn {{ request()->routeIs('groups.index') || request()->routeIs('groups.create') ? 'btn-light active' : 'btn-light' }} rounded-5"><i class="fa-duotone fa-user-group"></i> گروه ها </a>
            </div>
            <details class="js-list mt-2 mb-2">
                <summary class="title js-title"><i class="fa-duotone fa-users"></i> کاربران <span class="icon"></span></summary>
                <div class="content js-content">
                    <ul>
                        <li><a href="#" class="text-decoration-none text-dark">لیست کاربران</a></li>
                        <li><a href="#" class="text-decoration-none text-dark">ایجاد کاربر</a></li>
                    </ul>
                </div>
            </details>
        </div>
    </div>
</div>
<!-- /#sidebar-wrapper -->
