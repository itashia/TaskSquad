<div>
    <x-slot name="title">
        - گروه ها
    </x-slot>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('groups.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> افزودن گروه </a>
        </div>
        <div class="col-md-6">
            <input type="text" wire:model.live="search" class="form-control rounded-5" placeholder="جستجوی گروه ها ...">
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col" width="50px">شناسه</th>
            <th scope="col" width="100px">لوگو</th>
            <th scope="col" width="200px">عنوان</th>
            <th scope="col">نوع</th>
            <th scope="col" width="100px">عملیات</th>
        </tr>
        </thead>
        @if($readyToLoad)
            <tbody>
            @foreach($groups as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <th><img src="{{ asset('storage/'. $row->logo ) }}" class="img-fluid rounded-4" alt="" srcset=""></th>
                    <td>{{ $row->name }}</td>
                    <td>
                        @if($row->type == 0)
                            ندارد
                        @else
                            {{ optional($row->groups)->name ?? 'گروه وجود ندارد.' }}
                        @endif
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm" wire:click="deleteGroups({{$row->id}})"><i class="fa-duotone fa-trash text-white"></i></button>
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
    {!! $groups->links() !!}
</div>
