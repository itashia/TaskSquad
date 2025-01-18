<div>
    <x-slot name="title">
        پروفایل کاربر
    </x-slot>
    <div class="col-md-4 offset-4">
        <div class="card border-0 rounded-4">
            <div class="card-body">
                <form wire:submit.prevent="profileUser" enctype="multipart/form-data">
                    <figure class="text-center">
                        <div class="mt-3">
                            @if($pic)
                                <img src="{{ $pic->temporaryUrl() }}" class="img-fluid rounded-4" width="200px" alt="" srcset="">
                            @else
                                <i class="fa-duotone fa-user fa-5x"></i>
                            @endif
                        </div>
                    </figure>
                    <div class="col-md-12">
                        <label for="input11" class="form-label">عکس پرسنل</label>
                        <input type="file" class="form-control rounded-5 @error('pic') is-invalid @enderror" id="input11" wire:model.lazy="pic"
                               name="pic" accept=".png, .jpg, .jpeg">
                        <div class="text-danger">@error('pic') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input1" class="form-label">نام و نام خانوادگی</label>
                        <input type="text" class="form-control rounded-5 @error('name') is-invalid @enderror" name="name" wire:model="name" id="input1"">
                        <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input3" class="form-label">ایمیل</label>
                        <input type="email" class="form-control rounded-5 @error('email') is-invalid @enderror" name="email" wire:model="email" id="input3">
                        <div class="text-danger">@error('email') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input10" class="form-label">رمز عبور</label>
                        <input type="password" class="form-control rounded-5 @error('password') is-invalid @enderror" name="password" wire:model="password" id="input10">
                        <div class="text-danger">@error('password') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5 mt-3">به روز رسانی</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
