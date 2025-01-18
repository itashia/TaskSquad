<div>
    <x-slot name="title">
        - پروژه ها
    </x-slot>
    <div class="row">
        <div class="col-md-6">
            @can('creates_index')
                <a href="{{ route('projects.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> افزودن پروژه </a>
            @endcan
        </div>
        <div class="col-md-6">
            <input type="text" wire:model.live="search" class="form-control rounded-5" placeholder="جستجوی پروژه ها ...">
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col" width="50px">شناسه</th>
            <th scope="col" width="150px">عکس پروژه</th>
            <th scope="col">عنوان</th>
            <th scope="col" width="100px">وضعیت</th>
            <th scope="col" width="200px">تاریخ ایجاد</th>
            <th scope="col" width="150px">عملیات</th>
        </tr>
        </thead>
        @if($readyToLoad)
            <tbody>
                @foreach($projects as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <th><img src="{{ asset('storage/'. $row->pic) }}" class="img-fluid rounded-4" alt="" srcset=""></th>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->status->value }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('projects.status', $row->id) }}" type="button" class="btn btn-secondary btn-sm"><i class="fa-duotone fa-edit"></i></a>
                            <a href="{{ route('projects.show', $row->id) }}" type="button" class="btn btn-warning btn-sm"><i class="fa-duotone fa-eye"></i></a>
                            @can('deletes_index')
                                <button type="button" class="btn btn-danger btn-sm" wire:click="deleteProjects({{$row->id}})"><i class="fa-duotone fa-trash"></i></button>
                            @endcan
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
