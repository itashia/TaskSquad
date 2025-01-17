<div>
    <x-slot name="title">
        - ایجاد وظایف جدید
    </x-slot>
    <div class="col-md-7 offset-3">
        <div class="card mb-3 rounded-4">
            <div class="card-body">
                <form class="row g-3" wire:submit.prevent="saveTask">
                    <!-- Subject -->
                    <div class="col-md-12">
                        <label for="subject" class="form-label">موضوع</label>
                        <input type="text" class="form-control rounded-5 @error('subject') is-invalid @enderror" id="subject" wire:model="subject">
                        @error('subject') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Task Type -->
                    <div class="col-md-3">
                        <label for="type_id" class="form-label">نوع وظایف</label>
                        <select class="form-select rounded-5 @error('type_id') is-invalid @enderror" id="type_id" wire:model="type_id">
                            <option selected>انتخاب کنید ...</option>
                            <option value="0">نامه</option>
                            <option value="1">وظیفه</option>
                        </select>
                        @error('type_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Receiver -->
                    <div class="col-md-3">
                        <label for="user_id" class="form-label">ایجاد کننده</label>
                        <select class="form-select rounded-5 @error('user_id') is-invalid @enderror" id="user_id" wire:model="user_id">
                            <option selected>انتخاب کنید ...</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Priority -->
                    <div class="col-md-3">
                        <label for="priority_id" class="form-label">اولویت</label>
                        <select class="form-select rounded-5 @error('priority_id') is-invalid @enderror" id="priority_id" wire:model="priority_id">
                            <option selected>انتخاب کنید ...</option>
                            <option value="1">عادی</option>
                            <option value="2">لحظه‌ای</option>
                            <option value="3">آنی</option>
                        </select>
                        @error('priority_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="owner_id" class="form-label">گیرندگان</label>
                        <select class="form-select rounded-5 @error('owner_id') is-invalid @enderror" id="owner_id" wire:model="owner_id">
                            <option selected>انتخاب کنید ...</option>
                            @foreach($users as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        @error('owner_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label for="description" class="form-label">توضیحات</label>
                        <textarea class="form-control rounded-4 @error('description') is-invalid @enderror" id="description" wire:model="description"></textarea>
                        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary rounded-5">ثبت وظایف جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

