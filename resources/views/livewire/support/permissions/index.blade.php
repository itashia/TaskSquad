<div>
    <x-slot name="title">
        - دسترسی ها
    </x-slot>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('permissions.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> افزودن دسترسی </a>
        </div>
        <div class="col-md-6">
            <input type="text" wire:model.live="search" class="form-control rounded-5" placeholder="جستجوی دسترسی ها ...">
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col" width="50px">شناسه</th>
            <th scope="col" width="200px">نام دسترسی</th>
            <th scope="col">به فارسی</th>
            <th scope="col" width="200px">تاریخ ایجاد</th>
            <th scope="col" width="50px">عملیات</th>
        </tr>
        </thead>
        @if($readyToLoad)
            <tbody>
            @foreach($permissions as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <td>{{ $row->title }}</td>
                    <td>
                        {{ $row->value }}
                    </td>
                    <td>{{ $row->created_at }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm" wire:click="deletePermissions({{$row->id}})"><i class="fa-duotone fa-trash"></i></button>
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
    {!! $permissions->links() !!}
</div>
