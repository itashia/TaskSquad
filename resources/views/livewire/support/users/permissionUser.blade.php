<div>
    <x-slot name="title">
        - دسترسی های کاربر
    </x-slot>
    <div class="col-md-4 offset-md-4">
        <div class="card mb-3 rounded-4">
            <div class="card-body">
                <div class="text-center">
                    <h5>{{ auth()->user()->name }}</h5>
                </div>
                <form class="row g-3" wire:submit.prevent="savePermissionUser({{ $user->id }})">
                    <div class="col-md-12">
                        <label for="input1" class="form-label">مقام ها</label>
                        <select class="form-select rounded-5 @error('roles') is-invalid @enderror" name="roles" wire:model="roles" id="roles" multiple>
                            @foreach(\App\Models\Roles::all() as $role)
                                <option value="{{ $role->id }}">{{ $role->title }} - {{ $role->value }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">@error('roles') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input1" class="form-label">دسترسی ها</label>
                        <select class="form-select rounded-5 @error('permissions') is-invalid @enderror" name="permissions" id="permissions" multiple>
                            @foreach(\App\Models\Permissions::all() as $permission)
                                <option value="{{$permission->id}}">{{$permission->title}} - {{$permission->value}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">@error('permissions') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5">ثبت دسترسی کاربر</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

