<div>
    <div class="mb-3">
        <div class="row">
            @foreach(\App\Models\Roles::all() as $row)
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <h5 class="fw-bold text-center mb-4">
                            <span class="badge rounded-5
                                @if($row->id == 1)
                                   text-bg-primary
                                @elseif($row->id ==2)
                                   text-bg-danger
                                @elseif($row->id ==3)
                                   text-bg-success
                                @elseif($row->id ==4)
                                   text-bg-info
                                @elseif($row->id ==5)
                                   text-bg-warning
                                @elseif($row->id ==6)
                                   text-bg-white
                                @elseif($row->id ==7)
                                   text-bg-dark
                                @else
                                   text-bg-secondary
                               @endif
                               ">
                                <i class="fa-duotone fa-lock"></i> {{$row->value}}
                            </span>
                            </h5>
                            <h6 class="mb-4"> مجموع سمت های دسترسی <span
                                    class="badge text-bg-danger float-end">{{ DB::table('permissions_role')->where('role_id',$row->id)->count() }}</span>
                            </h6>

                            @php
                                $permissionsRoles = DB::table('permissions_role')->where('role_id', $row->id)->get();
                            @endphp

                            <div class="row">
                                @foreach($permissionsRoles as $row)
                                    @foreach(\App\Models\Permissions::where('id', $row->permission_id)->get() as $rows)
                                        <div class="col-md-10">
                                            <h6> - {{ $rows->value }}</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="float-end" wire:click="deletePermissionRole({{ $rows->id }})"><i class="fa-duotone fa-trash text-danger"></i></div>
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
