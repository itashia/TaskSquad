<div>
    <x-slot name="title">
        - توضیحات پروژه {{$project->name}}
    </x-slot>
    @if($project)

        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 rounded-5">
                    <div class="card-body"><span class="fw-bold">نام پروژه :</span> {{$project->name}}</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card border-0 rounded-5">
                    <div class="card-body"><span class="fw-bold">ایجاد کننده :</span> {{$project->user->name}}</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card border-0 rounded-5">
                    <div class="card-body"><span class="fw-bold">گیرنده :</span> {{$project->owner->name}}</div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card border-0 rounded-5">
                    <div class="card-body"><span class="fw-bold">وضعیت :</span>{{$project->status->value}}</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border-0 rounded-4 mt-3">
                    <div class="card-body">
                        <span class="fw-bold">توضیحات پروژه :</span>
                        <br>
                        {{ $project->description }}
                        <br>
                        <span class="fw-bold">منتشر شده : {{ $project->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border-0 rounded-4 mt-3">
                    <div class="card-body">
                        <span class="fw-bold">عکس پروژه :</span>
                        <div class="mt-3 text-center">
                            <img src="{{ asset('storage/'. $project->pic) }}" alt="" srcset="">
                            <br>
                            <a href="{{ asset('storage/'. $project->pic) }}" type="button" class="btn btn-primary rounded-5 mt-3"><i class="fa-duotone fa-download"></i> دانلود عکس پروژه </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('projects.index') }}" type="button" class="btn btn-light rounded-5 mt-3 mb-3"><i class="fa-duotone fa-home"></i> برگشت به صفحه پروژه </a>
    @else
        <p>پستی منتشر نشده است</p>
    @endif
</div>
