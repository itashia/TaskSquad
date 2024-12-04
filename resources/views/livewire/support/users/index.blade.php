<div>

<x-admin-layouts>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="50px">شناسه</th>
                <th scope="col" width="200px">نام و نام خانوادگی</th>
                <th scope="col">ایمیل</th>
                <th scope="col" width="150px">نام کاربری</th>
                <th scope="col" width="150px">سمت</th>
                <th scope="col" width="150px">موبایل</th>
                <th scope="col" width="200px">تاریخ ایجاد</th>
                <th scope="col" width="50px">عملیات</th>
            </tr>
            </thead>
            @if($readyToLoad)
                <tbody>
                @foreach($users as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->position }}</td>
                        <td>{{ $row->mobile }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td class="text-center">
                            <i class="fa-duotone fa-trash"></i>
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
</x-admin-layouts>
</div>





