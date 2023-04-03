<div>
	@if($isActive_RegisterCompetition == true)
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
				<form action="" wire:submit.prevent='create'>

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
										<input type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Enter Your IC number" wire:model="ic.0">
										@error('ic.0') <span class="text-danger error">{{ $message }}</span>@enderror
									</div>
								</div>
								<div class="col-md-2 py-1">
									<button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
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
										<input type="text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full  font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="Enter Other Member IC number" wire:model="ic.{{ $value }}">
										@error('ic.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
									</div>
								</div>
								<div class="col-md-2">
									<button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
								</div>
							</div>
						</div>
					</div>
					@endforeach

					<div class="form-group">
						<label for="status">Select School</label>
						<select class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" wire:model="selectedSchool">
							<option value="">Select a School</option>
							@foreach($schools as $school)
							<option value="{{ $school->id }}"> {{ $school->school_categories}} {{ $school->school_name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Age Categories</label>
						<select class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" wire:model="groups_age_categories">
							<option value="">Select Age Categories</option>
							<option value="from1-from3">Form 1-3</option>
							<option value="from4-from6">Form 4-5</option>
						</select>
					</div>

					<div class="form-group">
						<label>Invention Name</label>
						<input type="text" name="" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='Invention Name' wire:model="groups_invention_name" id="groups_invention_name">
					</div>

					<div class="form-inline">
						<a href="/dashboard" class="nav-link">Cancel</a>

						<button type="submit" class="">Submit</button>
					</div>
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
	@else
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<p style="color: red">The registration is closed at 2022/04/18</p>
		</div>
	</div>
	@endif
</div>