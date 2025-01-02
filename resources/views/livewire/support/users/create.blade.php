<div>
    <x-slot name="title">
        - ایجاد کاربر جدید
    </x-slot>
    <div class="card mb-3 rounded-4">
        <div class="card-body">
            <form class="row g-3" wire:submit.prevent="saveUser" enctype="multipart/form-data">
                <div class="col-md-3">
                    <label for="input1" class="form-label">نام و نام خانوادگی</label>
                    <input type="text" class="form-control rounded-5 @error('name') is-invalid @enderror" name="name" wire:model="name" id="input1">
                    <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input2" class="form-label">نام کاربری</label>
                    <input type="text" class="form-control rounded-5 @error('username') is-invalid @enderror" name="username" wire:model="username" id="input2">
                    <div class="text-danger">@error('username') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input3" class="form-label">ایمیل</label>
                    <input type="email" class="form-control rounded-5 @error('email') is-invalid @enderror" name="email" wire:model="email" id="input3">
                    <div class="text-danger">@error('email') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input4" class="form-label">موبایل</label>
                    <input type="text" class="form-control rounded-5 @error('mobile') is-invalid @enderror" name="mobile" wire:model="mobile" id="input4">
                    <div class="text-danger">@error('mobile') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input5" class="form-label">شماره تماس</label>
                    <input type="text" class="form-control rounded-5 @error('phone') is-invalid @enderror" name="phone" wire:model="phone" id="input5">
                    <div class="text-danger">@error('phone') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input6" class="form-label">کد ملی</label>
                    <input type="text" class="form-control rounded-5 @error('imei') is-invalid @enderror" name="imei" wire:model="imei" id="input6">
                    <div class="text-danger">@error('imei') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input7" class="form-label">تاریخ تولد</label>
                    <input type="text" class="form-control rounded-5 @error('birthday') is-invalid @enderror" name="birthday" wire:model="birthday" id="input7">
                    <div class="text-danger">@error('birthday') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input8" class="form-label">جنسیت</label>
                    <select class="form-select rounded-5 @error('gender') is-invalid @enderror" name="gender" wire:model="gender" id="input8" aria-label="Default select example">
                        <option selected>انتخاب کنید ...</option>
                        <option value="0">مرد</option>
                        <option value="1">زن</option>
                    </select>
                    <div class="text-danger">@error('gender') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input8" class="form-label">مقام</label>
                    <select class="form-select rounded-5 @error('role_id') is-invalid @enderror" name="role_id" wire:model="role_id" id="input8" aria-label="Default select example">
                        <option selected>انتخاب کنید ...</option>
                        @foreach(\App\Models\Roles::all() as $row)
                            <option value="{{ $row->id }}"> {{ $row->value }}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">@error('role_id') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input9" class="form-label">سمت</label>
                    <input type="text" class="form-control rounded-5 @error('position') is-invalid @enderror" name="position" wire:model="position" id="input9">
                    <div class="text-danger">@error('position') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input10" class="form-label">رمز عبور</label>
                    <input type="password" class="form-control rounded-5 @error('password') is-invalid @enderror" name="password" wire:model="password" id="input10">
                    <div class="text-danger">@error('password') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input11" class="form-label">عکس پرسنل</label>
                    <input type="file" class="form-control rounded-5 @error('pic') is-invalid @enderror" id="input11" wire:model.lazy="pic"
                           name="pic" accept=".png, .jpg, .jpeg">
                    <div class="text-danger">@error('pic') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="mt-3">
                        @if( $pic )
                            <img src="{{ $pic->temporaryUrl() }}" class="img-fluid rounded-4" alt="" srcset="">
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary rounded-5">ثبت کاربر جدید</button>
                </div>
            </form>
        </div>
    </div>

</div>

