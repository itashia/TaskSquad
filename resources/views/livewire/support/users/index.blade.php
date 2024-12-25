<div>
    <x-slot name="title">
        - کاربران
    </x-slot>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('users.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> افزودن کاربر </a>
            <a href="{{ route('users.trash') }}" type="button" class="btn btn-danger rounded-5"><i class="fa-duotone fa-trash"></i> زباله دان ({{ \App\Models\User::onlyTrashed()->count() }}) </a>
        </div>
        <div class="col-md-6">
            <input type="text" wire:model.live="search" class="form-control rounded-5" placeholder="جستجوی کاربران ...">
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col" width="50px">شناسه</th>
                <th scope="col" width="100px">عکس</th>
                <th scope="col" width="200px">نام و نام خانوادگی</th>
                <th scope="col">ایمیل</th>
                <th scope="col" width="150px">نام کاربری</th>
                <th scope="col" width="150px">سمت</th>
                <th scope="col" width="150px">موبایل</th>
                <th scope="col" width="200px">تاریخ ایجاد</th>
                <th scope="col" width="150px">عملیات</th>
            </tr>
        </thead>
        @if($readyToLoad)
            <tbody>
            @foreach($users as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <th><img src="{{ asset('storage/'. $row->pic) }}" class="img-fluid rounded-4" alt="" srcset=""></th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->position }}</td>
                    <td>{{ $row->mobile }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('users.edit', $row->id) }}" type="button" class="btn btn-secondary btn-sm"><i class="fa-duotone fa-user-edit"></i></a>
                        <a href="{{ route('permissionUser.create', $row->id) }}" type="button" class="btn btn-warning btn-sm"><i class="fa-duotone fa-lock"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" wire:click="deleteUser({{$row->id}})"><i class="fa-duotone fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @else
            <div class="alert alert-warning" role="alert">
                <i class="fa-duotone fa-solid fa-spinner fa-spin"></i> در حال خواندن اطلاعات از دیتابیس ...
            </div>
        @endif
    </table>
    {!! $users->links() !!}
</div>





