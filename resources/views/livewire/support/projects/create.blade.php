<div>
    <x-slot name="title">
        - ایجاد پروژه جدید
    </x-slot>
    <div class="col-md-7 offset-md-3">
        <div class="card mb-3 rounded-4">
            <div class="card-body">
                <form class="row g-3" wire:submit.prevent="saveProject">
                    <div class="col-md-12">
                        <label for="input1" class="form-label">عنوان</label>
                        <input type="text" class="form-control rounded-5 @error('title') is-invalid @enderror" name="title" wire:model="title" id="input1">
                        <div class="text-danger">@error('title') {{ $message }} @enderror</div>
                    </div>

                    <div class="col-md-4">
                        <label for="user_id" class="form-label">ایجاد کننده</label>
                        <select class="form-select rounded-5 @error('user_id') is-invalid @enderror" id="user_id" wire:model="user_id">
                            <option selected>انتخاب کنید ...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="owner_id" class="form-label">گیرندگان</label>
                        <select class="form-select rounded-5 @error('owner_id') is-invalid @enderror" id="owner_id" wire:model="owner_id">
                            <option selected>انتخاب کنید ...</option>
                            @foreach($users as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        @error('owner_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="input1" class="form-label">وضعیت پروژه</label>
                        <select class="form-select rounded-5 @error('status_id') is-invalid @enderror" name="status_id" wire:model="status_id" id="input1" aria-label="Default select example">
                            <option selected>انتخاب کنید ...</option>
                            @foreach(\App\Models\ProjectStatus::all() as $row)
                                <option value="{{ $row->id }}"> {{ $row->value }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">@error('status_id') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input1" class="form-label">توضیحات</label>
                        <textarea class="form-control rounded-4 @error('description') is-invalid @enderror" name="description" wire:model="description" id="input1"></textarea>
                        <div class="text-danger">@error('description') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
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
