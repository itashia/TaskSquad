<div>
    <x-slot name="title">
        - ایجاد گروه جدید
    </x-slot>
    <div class="col-md-4 offset-md-4">
        <div class="card mb-3 rounded-4">
            <div class="card-body">
                <form class="row g-3" wire:submit.prevent="saveGroups" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="input1" class="form-label">عنوان</label>
                        <input type="text" class="form-control rounded-5 @error('name') is-invalid @enderror" name="name" wire:model="name" id="input1">
                        <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input2" class="form-label">نوع</label>
                        <select class="form-select rounded-5 @error('logo') is-invalid @enderror" name="type" wire:model="type" aria-label="Default select example" id="input2">
                            <option selected>انتخاب کنید ...</option>
                            @foreach(\App\Models\Groups::all() as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">@error('type') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label for="input11" class="form-label">لوگو گروه</label>
                        <input type="file" class="form-control rounded-5 @error('logo') is-invalid @enderror" id="input11" wire:model.lazy="logo"
                               name="logo" accept=".png, .jpg, .jpeg">
                        <div class="text-danger">@error('pic') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="mt-3">
                            @if( $logo )
                                <img src="{{ $logo->temporaryUrl() }}" class="img-fluid rounded-4" width="100px" alt="" srcset="">
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5">ثبت گروه جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
