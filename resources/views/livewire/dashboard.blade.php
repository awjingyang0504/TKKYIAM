<div>
	@include('layouts.partials.dashboardnavbar')

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

			<!-- Check role id  -->
			@if(Auth::user()->role_id == 3)
			<p style="color: red">Please register competition first</p>
			@else

			<div class="form-group">

				<!-- Check video variable  -->
				@if($isActive_RegisterCompetition == false)
				<p style="color: red">The submission has expired. Please wait for the result</p>
				@elseif($videos == null)
				<button wire:click.prevent="submitProposal" type="button" class="btn btn-outline-secondary btn-lg btn-block colour-green">Upload Proposal</button>
				@else

				<!-- participant status  -->
				@if($participant_status == 4)
				<button wire:click.prevent="updateProposal" type="button" class="btn btn-outline-secondary btn-lg btn-block colour-green">Update Proposal</button>
				@elseif($participant_status == 6)
				<p>Congratulation you are in finalist! Please submit your final proposal for final review.</p>
				<button wire:click.prevent="submitFinalProposal" type="button" class="btn btn-outline-secondary btn-lg btn-block colour-green">Upload Final Proposal</button>
				@elseif($participant_status == 5 || $participant_status == 7 || $participant_status == 8 || $participant_status == 9 || $participant_status == 10)
				<p style="color: red">The submission has expired. Please wait for the result</p>
				@elseif($participant_status == 1)
				<p style="color: red">Sorry to inform that you were disqualified</p>
				@endif
				<!-- participant status  -->

			</div>

			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div class="bloc ml-6">
								{{$videos->participant->group->groups_invention_name}}
							</div>
						</div>
						<div class="col">
							<div id="bloc_paticipant_name">
								Participant:
							</div>
							<div class="bloc">
								{{$videos->participant->participant_name}}
							</div>
						</div>
						<div class="col col-lg-2 text-right">
							<div id="">
								{{$videos->updated_at}}
							</div>
						</div>
					</div>
					@if($videos->final_file != null)
					<div style="margin-left: 10px">
						<button wire:click="exportFinalPorposal({{$videos->id}})" style="color: red">
							Final Proposal pdf
						</button>
					</div>
					@endif
					<div style="margin-left: 10px">
						<button wire:click="export({{$videos->id}})" style="color: red">
							Proposal pdf
						</button>
					</div>
					<div class="bloc">
						<button wire:click.prevent="readProposal({{$videos->id}})" type="link" class="text-muted">read more</button>
					</div>
					<div class="p-6 bg-white border-b border-gray-200 ">
						<iframe width="854" height="480" src="{{$videos->video_link}}" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<!-- update Modal -->
			@include('modal.updateProposal_modal')
			<!-- read Modal -->
			@include('modal.readProposal_modal')
			@endif
			<!-- Check video variable  -->

			<!-- Modal -->
			<!-- create Modal -->
			@include('modal.submitFinalProposal_modal')
			@include('modal.submitProposal_modal')
			@endif
			<!-- Check role id  -->
		</div>
	</div>
</div>