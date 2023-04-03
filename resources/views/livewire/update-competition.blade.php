<div>
    @if($isActive_UpdateCompetition == true)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--flash message--}}
            @if ($flashMessage == true)
            <div>
                @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @elseif (session()->has('message1'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message1') }}
                </div>
                @endif
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="form-group">
                    <p>You are already registered. You are able to update competition details before 2022-04-18.</p>
                </div>
                <form action="" wire:submit.prevent='update'>
                    <div class="form-group">
                        <div class="add-input">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Enter Your Full Name" wire:model="name.0">
                                        @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="" wire:model="ic.0">
                                        @error('ic.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($inputs as $key => $value)
                    <div class="form-group">
                        <div class=" add-input">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Enter Other Member Name" wire:model="name.{{ $value }}">
                                        @error('name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="" wire:model="ic.{{ $value }}">
                                        @error('ic.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label for=""><b>Invention Name</b></label>
                        <input wire:model='edit_groups_invention_name' type="text" class='bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white' name="edit_groups_invention_name" id="edit_groups_invention_name" class="form-control form-control-lg">
                        <span class="text-danger">
                            @error('edit_groups_invention_name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Age Categories</label>
                        <select wire:model="edit_groups_age_categories" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                            <option value="">Select Age Categories</option>
                            <option value="from1-from3">Form 1-3</option>
                            <option value="from4-from6">Form 4-5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Select School</label>
                        <select wire:model="edit_selectedSchool" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                            <option value="">Select a School</option>
                            @foreach($schools as $school)
                            <option value="{{ $school->id }}"> {{ $school->school_categories}} {{ $school->school_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-inline">
                        <button type="submit" class="">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="form-group">
                    <p>The registration is closed.</p>
                </div>
                <form action="" wire:submit.prevent='update'>
                    <div class="form-group">
                        <div class="add-input">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input readonly type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Enter Your Full Name" wire:model="name.0">
                                        @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input readonly type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="" wire:model="ic.0">
                                        @error('ic.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($inputs as $key => $value)
                    <div class="form-group">
                        <div class=" add-input">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input readonly type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Enter Other Member Name" wire:model="name.{{ $value }}">
                                        @error('name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input readonly type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="" wire:model="ic.{{ $value }}">
                                        @error('ic.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="form-group">
                        <label for=""><b>Invention Name</b></label>
                        <input readonly wire:model='edit_groups_invention_name' type="text" class='bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white' name="edit_groups_invention_name" id="edit_groups_invention_name" class="form-control form-control-lg">
                        <span class="text-danger">
                            @error('edit_groups_invention_name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Age Categories</label>
                        <select disabled wire:model="edit_groups_age_categories" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                            <option value="">Select Age Categories</option>
                            <option value="from1-from3">Form 1-3</option>
                            <option value="from4-from6">Form 4-5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Select School</label>
                        <select disabled wire:model="edit_selectedSchool" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">
                            <option value="">Select a School</option>
                            @foreach($schools as $school)
                            <option value="{{ $school->id }}"> {{ $school->school_categories}} {{ $school->school_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>