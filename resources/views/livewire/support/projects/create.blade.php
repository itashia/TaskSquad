<div>
    <x-slot name="title">
        - ایجاد پروژه جدید
    </x-slot>
    <div class="col-md-4 offset-md-4">
        <div class="card mb-3 rounded-4">
            <div class="card-body">
                <form class="row g-3" wire:submit.prevent="saveProject">
                    <div class="col-md-12">
                        <label for="input1" class="form-label">عنوان</label>
                        <input type="text" class="form-control rounded-5 @error('name') is-invalid @enderror" name="name" wire:model="name" id="input1">
                        <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input1" class="form-label">توضیحات</label>
                        <textarea class="form-control rounded-5 @error('description') is-invalid @enderror" name="description" wire:model="description" id="input1"></textarea>
                        <div class="text-danger">@error('description') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-3">
                        <label for="input11" class="form-label">عکس پروژه</label>
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
                        <button type="submit" class="btn btn-primary rounded-5">ثبت پروژه جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
