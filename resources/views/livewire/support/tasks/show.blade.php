<div>
    <x-slot name="title">
        - توضیحات وظیفه {{$task->subject}}
    </x-slot>
    @if($task)

        <div class="row">
            <div class="col-md-10">
                <div class="card border-0 rounded-5">
                    <div class="card-body"><span class="fw-bold">نام وظیفه :</span> {{$task->title}}</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card border-0 rounded-5">
                    <div class="card-body"><span class="fw-bold">نوع :</span>
                        @if($task->type_id == 1)
                            وظیفه
                        @else
                            نامه
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 rounded-5 mt-3">
                    <div class="card-body"><span class="fw-bold">اولویت :</span>
                        @if($task->priority_id == 1)
                            عادی
                        @elseif($task->priority_id == 2)
                            لحظه ای
                        @elseif($task->priority_id == 3)
                            آنی
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 rounded-5 mt-3">
                    <div class="card-body"><span class="fw-bold">ایجاد کننده :</span> {{$task->user->name}}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 rounded-5 mt-3">
                    <div class="card-body"><span class="fw-bold">گیرنده :</span> {{$task->owner->name}}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 rounded-5 mt-3">
                    <div class="card-body"><span class="fw-bold">وضعیت :</span>{{$task->status->value}}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border-0 rounded-4 mt-3">
                    <div class="card-body">
                        <span class="fw-bold">توضیحات پروژه :</span>
                        <br>
                        {!! $task->description !!}
                        <br>
                        <span class="fw-bold">منتشر شده : {{ $task->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('tasks.index') }}" type="button" class="btn btn-light rounded-5 mt-3 mb-3"><i class="fa-duotone fa-home"></i> برگشت به صفحه وظیفه ها </a>
    @else
        <p>پستی منتشر نشده است</p>
    @endif
</div>
