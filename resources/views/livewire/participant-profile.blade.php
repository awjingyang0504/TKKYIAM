<div>
@include('layouts.partials.dashboardnavbar')
<div class="py-12">
	<div class="row justify-content-center">
		<div class="col-md-8">
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
			<div class="card">
				<div class="card-header">{{ __('My Profile Settings') }}</div>
				<div class="card-body">
					<div>
						<label>Name</label>
						<input wire:model="name" type="text" class="form-control" />
						@if ($errors->has('name'))
						<p style="color: red">{{$errors->first('name')}}</p>
						@endif

						<label>Email</label>
						<input wire:model="email" type="email" class="form-control" />
						@if ($errors->has('email'))
						<p style="color: red">{{$errors->first('email')}}</p>
						@endif

						@if ($email !== $prevEmail)
						<br />
						<label>Current Password</label>
						<input wire:model="current_password_for_email" type="password" class="form-control" />
						@if ($errors->has('current_password_for_email'))
						<p style="color: red">{{$errors->first('current_password_for_email')}}</p>
						@endif
						@endif

						<label>Password</label>
						<input min="8" wire:model="password" type="password" class="form-control" />
						@if ($errors->has('password'))
						<p style="color: red">{{$errors->first('password')}}</p>
						@endif

						<br />
						<button wire:click="save" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>