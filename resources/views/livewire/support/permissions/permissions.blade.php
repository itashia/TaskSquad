<div>
    <div class="mb-3">
        <div class="row">
            @foreach(\App\Models\Roles::all() as $row)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <h5 class="fw-bold text-center mb-4">{{ $row->value }}</h5>
                        <h6 class="mb-4"> مجموع سمت های دسترسی <span class="badge text-bg-danger float-end">{{ DB::table('permission_role')->where('role_id',$row->id)->count() }}</span></h6>

                        @php
                            $permissionsRoles = DB::table('permission_role')->where('role_id',$row->id)->get();
                        @endphp

                        <div class="row">
                            @foreach($permissionsRoles as $row)
                                @foreach(\App\Models\Permission::where('id', $row->permission_id)->get() as $row)
                                    <div class="col-md-10">
                                        <h6> - {{ $row->value }}</h6>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="float-end" wire:click="deletePermissionRole({{ $row->id }})"><i class="fa-duotone fa-trash text-danger"></i></div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
