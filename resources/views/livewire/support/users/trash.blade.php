<div>
    <x-slot name="title">
        - زباله دان کاربران
    </x-slot>
    <a href="{{ route('users.index') }}" type="button" class="btn btn-light rounded-5"><i class="fa-duotone fa-arrow-right"></i> برگرد به صفحه اول کاربران </a>
    <button type="button" class="btn btn-danger rounded-5"><i class="fa-duotone fa-trash"></i> تعداد کاربران در شرف حذف نهایی ({{ \App\Models\User::onlyTrashed()->count() }}) </button>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col" width="50px">شناسه</th>
            <th scope="col" width="100px">عکس</th>
            <th scope="col" width="200px">نام و نام خانوادگی</th>
            <th scope="col">ایمیل</th>
            <th scope="col" width="150px">سمت</th>
            <th scope="col" width="150px">موبایل</th>
            <th scope="col" width="200px">تاریخ ایجاد</th>
            <th scope="col" width="100px">عملیات</th>
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
                    <td>{{ $row->position }}</td>
                    <td>{{ $row->mobile }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm" wire:click="recoveryUser({{$row->id}})"><i class="fa-duotone fa-rotate-back"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" wire:click="deleteTrash({{$row->id}})"><i class="fa-duotone fa-trash text-white"></i></button>
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

