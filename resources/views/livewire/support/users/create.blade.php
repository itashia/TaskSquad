<div>
    <div class="card mb-3 rounded-4">
        <div class="card-body">
            <form class="row g-3" wire:submit.prevent="saveUser" enctype="multipart/form-data">
                <div class="col-md-3">
                    <label for="input1" class="form-label">نام و نام خانوادگی</label>
                    <input type="text" class="form-control rounded-5" name="name" wire:model="user.name" id="input1">
                </div>
                <div class="col-md-3">
                    <label for="input2" class="form-label">نام کاربری</label>
                    <input type="text" class="form-control rounded-5" name="username" wire:model="user.username" id="input2">
                </div>
                <div class="col-md-3">
                    <label for="input3" class="form-label">ایمیل</label>
                    <input type="email" class="form-control rounded-5" name="email" wire:model="user.email" id="input3">
                </div>
                <div class="col-md-3">
                    <label for="input4" class="form-label">موبایل</label>
                    <input type="text" class="form-control rounded-5" name="mobile" wire:model="user.mobile" id="input4">
                </div>
                <div class="col-md-3">
                    <label for="input5" class="form-label">شماره تماس</label>
                    <input type="text" class="form-control rounded-5" name="phone" wire:model="user.phone" id="input5">
                </div>
                <div class="col-md-3">
                    <label for="input6" class="form-label">کد ملی</label>
                    <input type="text" class="form-control rounded-5" name="imei" wire:model="user.imei" id="input6">
                </div>
                <div class="col-md-3">
                    <label for="input7" class="form-label">تاریخ تولد</label>
                    <input type="text" class="form-control rounded-5" name="birthday" wire:model="user.birthday" id="input7">
                </div>
                <div class="col-md-3">
                    <label for="input8" class="form-label">جنسیت</label>
                    <select class="form-select rounded-5" name="gender" wire:model="user.gender" id="input8" aria-label="Default select example">
                        <option selected>انتخاب کنید ...</option>
                        <option value="0">مرد</option>
                        <option value="1">زن</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="input9" class="form-label">سمت</label>
                    <input type="text" class="form-control rounded-5" name="position" wire:model="user.position" id="input9">
                </div>
                <div class="col-md-3">
                    <label for="input10" class="form-label">رمز عبور</label>
                    <input type="password" class="form-control rounded-5" name="password" wire:model="user.password" id="input10">
                </div>
                <div class="col-md-3">
                    <label for="input11" class="form-label">عکس پرسنل</label>
                    <input type="file" class="form-control rounded-5" id="input11" wire:model.lazy="pic"
                           name="pic" accept=".png, .jpg, .jpeg">
                </div>
                <div class="col-md-3 text-center">
                    <div class="mt-3">

                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary rounded-5">ثبت کاربر جدید</button>
                </div>
            </form>
        </div>
    </div>
</div>
