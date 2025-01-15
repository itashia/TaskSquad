<div>
    <x-slot name="title">
        - وظایف ها
    </x-slot>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('tasks.create') }}" type="button" class="btn btn-primary rounded-5"><i class="fa-duotone fa-plus"></i> افزودن وظایف </a>
        </div>
        <div class="col-md-6">
            <input type="text" wire:model.live="search" class="form-control rounded-5" placeholder="جستجوی وظایف ها ...">
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th scope="col" width="50px">شناسه</th>
            <th scope="col" width="200px">عنوان</th>
            <th scope="col">نوع</th>
            <th scope="col">ایجاد کننده</th>
            <th scope="col">اولویت</th>
            <th scope="col">گیرنده</th>
            <th scope="col">وضعیت</th>
            <th scope="col" width="200px">تاریخ ایجاد</th>
            <th scope="col" width="50px">عملیات</th>
        </tr>
        </thead>
        @if($readyToLoad)
            <tbody>
                @foreach($tasks as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        <td>{{ $row->subject }}</td>
                        <td>
                            @if($row->type_id == 1)
                                وظیفه
                            @else
                                نامه
                            @endif
                        </td>
                        <td>{{ $row->user->name ?? 'نام کاربری موجود نیست' }}</td>
                        <td>
                            @if($row->priority_id == 1)
                                عادی
                            @elseif($row->priority_id == 2)
                                لحظه ای
                            @else
                                آنی
                            @endif
                        </td>
                        <td>{{$row->owner->name}}</td>
                        <td></td>
                        <td>{{$row->created_at}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm" wire:click="deleteTasks({{$row->id}})"><i class="fa-duotone fa-trash"></i></button>
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
    {!! $tasks->links() !!}
</div>

