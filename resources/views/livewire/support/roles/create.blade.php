<div>
    <x-slot name="title">
        - ایجاد گروه جدید
    </x-slot>
    <div class="col-md-4 offset-md-4">
        <div class="card mb-3 rounded-4">
            <div class="card-body">
                <form class="row g-3" wire:submit.prevent="saveRoles">
                    <div class="col-md-12">
                        <label for="input1" class="form-label">عنوان انگلیسی</label>
                        <input type="text" class="form-control rounded-5 @error('title') is-invalid @enderror" name="title" wire:model="title" id="input1">
                        <div class="text-danger">@error('title') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input1" class="form-label">نام مقام به فارسی</label>
                        <input type="text" class="form-control rounded-5 @error('value') is-invalid @enderror" name="value" wire:model="value" id="input1">
                        <div class="text-danger">@error('value') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5">ثبت مقام جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
