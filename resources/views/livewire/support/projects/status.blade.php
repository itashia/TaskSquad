<div>
    <x-slot name="title">
        - به روز رسانی وضعیت
    </x-slot>
    <div class="col-md-4 offset-md-4">
        <div class="card mb-3 rounded-4">
            <div class="card-body">
                <form class="row g-3" wire:submit.prevent="statusProject">
                    <div class="col-md-12">
                        <label for="input1" class="form-label">وضعیت پروژه</label>
                        <select class="form-select rounded-5 @error('status_id') is-invalid @enderror" name="status_id" wire:model="status_id" id="input1" aria-label="Default select example">
                            <option selected>انتخاب کنید ...</option>
                            @foreach(\App\Models\ProjectStatus::all() as $row)
                                <option value="{{ $row->id }}"> {{ $row->value }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">@error('status_id') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5">به روز رسانی وضعیت پروژه</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

