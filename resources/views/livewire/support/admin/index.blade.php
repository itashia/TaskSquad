<div>
    <div class="mt-5">
        @if(!Auth::user()->isAdmin())
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-tasks fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">وظیفه ها : {{ \App\Models\Task::where('owner_id', Auth::id())->count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-folder-open fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">پروژه ها : {{ \App\Models\Project::where('owner_id', Auth::id())->count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-users fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">کاربران : {{ \App\Models\User::count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-group-arrows-rotate fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">گروه ها : {{ \App\Models\Groups::count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-tower-control fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">مقام ها : {{ \App\Models\Roles::count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-lock fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">دسترسی ها : {{ \App\Models\Permissions::count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-tasks fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">وظیفه ها : {{ \App\Models\Task::count() }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card rounded-4 border-0">
                        <div class="card-body">
                            <i class="fa-duotone fa-folder-open fa-3x float-end"></i>
                            <h2 class="fs-5 fw-bold mt-2">پروژه ها : {{ \App\Models\Project::count() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
