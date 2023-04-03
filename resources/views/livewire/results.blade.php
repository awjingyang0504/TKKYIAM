<div>
	@include('layouts.partials.homelivewirenavbar')
	<div class="py-12">
		@foreach($results as $result)
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div>
								<h2>{{$result->title}}</h2>
							</div>
						</div>
					</div>
					<div>
						<button wire:click="export({{$result->id}})" style="color: red">
							Proposal pdf
						</button>
					</div>
					<div class="text-left">
						<div id="bloc_updated_at">
							Update: {{$result->updated_at}}
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach

		<!-- delete more Modal -->
		@include('modal.deleteProposal_modal');

		<script src="{{ asset('js/expanding-manage-competition.js') }}"></script>
	</div>
</div>