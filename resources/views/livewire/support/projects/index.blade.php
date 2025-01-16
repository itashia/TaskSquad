<div>
    <x-slot name="title">
        - پروژه ها
    </x-slot>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('projects.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> افزودن پروژه </a>
        </div>
        <div class="col-md-6">
            <input type="text" wire:model.live="search" class="form-control rounded-5" placeholder="جستجوی پروژه ها ...">
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col" width="50px">شناسه</th>
            <th scope="col" width="100px">عکس پروژه</th>
            <th scope="col">عنوان</th>
            <th scope="col">توضیحات</th>
            <th scope="col" width="100px">وضعیت</th>
            <th scope="col" width="200px">تاریخ ایجاد</th>
            <th scope="col" width="100px">عملیات</th>
        </tr>
        </thead>
        @if($readyToLoad)
            <tbody>
            @foreach($projects as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <th><img src="{{ asset('storage/'. $row->pic) }}" class="img-fluid rounded-4" alt="" srcset=""></th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->description }}</td>
                    <td>
                        {{ $row->status->value }}
                    </td>
                    <td>{{ $row->created_at }}</td>
                    <td class="text-center">
                        <a href="{{ route('projects.status', $row->id) }}" type="button" class="btn btn-secondary btn-sm"><i class="fa-duotone fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" wire:click="deleteProjects({{$row->id}})"><i class="fa-duotone fa-trash"></i></button>
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
    {!! $projects->links() !!}
</div>
