<div>
    <x-slot name="title">
        - ایجاد وظایف جدید
    </x-slot>
    <div class="card mb-3 rounded-4">
        <div class="card-body">
            <form class="row g-3" wire:submit.prevent="saveTasks" enctype="multipart/form-data">
                <div class="col-md-3">
                    <label for="input2" class="form-label">موضوع</label>
                    <input type="text" class="form-control rounded-5 @error('subject') is-invalid @enderror" name="subject" wire:model="subject" id="input2">
                    <div class="text-danger">@error('subject') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input8" class="form-label">نوع وظایف</label>
                    <select class="form-select rounded-5 @error('type_id') is-invalid @enderror" name="type_id" wire:model="type_id" id="input8" aria-label="Default select example">
                        <option selected>انتخاب کنید ...</option>
                        <option value="0">نامه</option>
                        <option value="1">وظیفه</option>
                    </select>
                    <div class="text-danger">@error('type_id') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input8" class="form-label">گیرنده اصلی</label>
                    <select class="form-select rounded-5 @error('user_id') is-invalid @enderror" name="user_id" wire:model="user_id" id="input8" aria-label="Default select example">
                        <option selected>انتخاب کنید ...</option>
                        @foreach(\App\Models\User::where('is_staff', 1)->get() as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">@error('user_id') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input8" class="form-label">اولویت</label>
                    <select class="form-select rounded-5 @error('priority_id') is-invalid @enderror" name="priority_id" wire:model="priority_id" id="input8" aria-label="Default select example">
                        <option selected>انتخاب کنید ...</option>
                        <option value="1">عادی</option>
                        <option value="2" >لحظه ای</option>
                        <option value="3" >آنی</option>
                    </select>
                    <div class="text-danger">@error('priority_id') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input8" class="form-label">گیرندگان نامه</label>
                    <select class="form-select rounded-5 @error('role') is-invalid @enderror" name="role" wire:model="role" id="input8" aria-label="Default select example">
                        <option selected>انتخاب کنید ...</option>
                        @foreach(\App\Models\Roles::all() as $row)
                            <option value="{{$row->id}}">{{ $row->value }}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">@error('role') {{ $message }} @enderror</div>
                </div>
                <div class="col-md-3">
                    <label for="input11" class="form-label">فایل اول</label>
                    <input type="file" class="form-control rounded-5 @error('fileOne') is-invalid @enderror" id="input11" wire:model.lazy="fileOne"
                           name="fileOne" accept=".png, .jpg, .jpeg">
                    <div class="text-danger">@error('fileOne') {{ $message }} @enderror</div>
                    <div class="mt-3 text-center">
                        @if( $fileOne )
                            <img src="{{ $fileOne->temporaryUrl() }}" class="img-fluid rounded-4" width="100px;" alt="" srcset="">
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="input11" class="form-label">فایل دوم</label>
                    <input type="file" class="form-control rounded-5 @error('fileTwo') is-invalid @enderror" id="input11" wire:model.lazy="fileTwo"
                           name="fileTwo" accept=".png, .jpg, .jpeg">
                    <div class="text-danger">@error('fileTwo') {{ $message }} @enderror</div>
                    <div class="mt-3 text-center">
                        @if( $fileTwo)
                            <img src="{{ $fileTwo->temporaryUrl() }}" class="img-fluid rounded-4" width="100px;" alt="" srcset="">
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="input11" class="form-label">فایل سوم</label>
                    <input type="file" class="form-control rounded-5 @error('fileThree') is-invalid @enderror" id="input11" wire:model.lazy="fileThree"
                           name="fileThree" accept=".png, .jpg, .jpeg">
                    <div class="text-danger">@error('fileThree') {{ $message }} @enderror</div>
                    <div class="mt-3 text-center">
                        @if( $fileThree )
                            <img src="{{ $fileThree->temporaryUrl() }}" class="img-fluid rounded-4" width="100px;" alt="" srcset="">
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <label for="input4" class="form-label">توضیحات</label>
                    <textarea class="form-control rounded-4 @error('description') is-invalid @enderror" name="description" wire:model="description" id="input4"></textarea>
                    <div class="text-danger">@error('description') {{ $message }} @enderror</div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary rounded-5">ثبت وظایف جدید</button>
                </div>
            </form>
        </div>
    </div>
</div>

