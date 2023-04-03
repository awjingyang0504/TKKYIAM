<div>
@include('layouts.partials.dashboardnavbar')
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="{{ asset('css/expanding-manage-dashboard.css') }}" rel="stylesheet">
	</head>

	@if($isActive_ManageParticipant == true)
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
			
			<!-- sorting by status-->
			<div style="display: inline-block;">
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 200px;" wire:model.debounce.500ms="groupby">
					<option selected>orderby status</option>
					<option value="video">all</option>
					<option value="1">Disqualified({{$participant_status_count_1}})</option>
					<option value="10">Unfortune({{$participant_status_count_10}})</option>
					<option value="2">Registered({{$participant_status_count_2}})</option>
					<option value="4">Reviewing({{$participant_status_count_4}})</option>
					<option value="5">Shortlisted({{$participant_status_count_5}})</option>
					<option value="6">Finalist({{$participant_status_count_6}})</option>
					<option value="7">Bronze({{$participant_status_count_7}})</option>
					<option value="8">Silver({{$participant_status_count_8}})</option>
					<option value="9">Gold({{$participant_status_count_9}})</option>
				</select>

			</div>

			<!-- sorting by time-->
			<div style="display: inline-block;">
				@if($groupby == 'video')
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 120px;" wire:model="sortVideoDirection">
					<option selected>orderby Date</option>
					<option value="desc">Latest</option>
					<option value="asc">Earliest</option>
				</select>
				@else
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 120px;" wire:model="sortParticipantDirection">
					<option selected>orderby Date</option>
					<option value="desc">Latest</option>
					<option value="asc">Earliest</option>
				</select>
				@endif
			</div>

			<!-- sorting by age categories-->
			<div style="display: inline-block;">
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 200px;" wire:model="sortCategoryDirection">
					<option selected>sort by categories</option>
					<option value="from1-from3">From1 - 3</option>
					<option value="from4-from6">From4 - 6</option>
				</select>
			</div>
		</div>

		@if($groupby == 'video')
		@foreach($videos as $video)
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div class="bloc ml-6">
								{{$video->participant->group->groups_invention_name}}
							</div>
						</div>
						<div class="col">
							<div id="bloc_paticipant_name">
								Participant:
							</div>
							<div class="bloc">
								{{$video->participant->participant_name}}
							</div>
						</div>
						<div class="col col-lg-2 text-right">
							<div id="">
								{{$video->updated_at}}
							</div>
						</div>
					</div>
					
					<div class="py-2">
						<div class="py-2" style="display: inline-block;">
							<select wire:model.defer="selectedstatus" wire:change="updStatus({{$video->participant->id}},'{{$video->participant->participant_name}}')" class="rounded border" aria-label="Default select example" style="display: inline-block; width: 200px;">
								<option selected>{{$video->participant->status->statuses_name}}</option>
								@if($video->participant->group->groups_age_categories == 'from1-from3')
								<?php
								if ($video->participant->status->id == 4 && $amount_from1tofrom3_5 < 4) { ?>
									<!-- give option to participant reviewing when shortlisted is NOT full-->
									<option value="1">disqualified</option>
									<option value="5">shortlisted</option>
									<option value="10">unfortune</option>
								<?php } elseif ($video->participant->status->id == 4 &&  $amount_from1tofrom3_5 == 4) { ?>
									<!-- give option to participant reviewing when shortlisted is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($video->participant->status->id == 5 && $amount_from1tofrom3_6 < 3) { ?>
									<!-- give option to participant shortlisted when finalist is NOT full -->
									<option value="1">disqualified</option>
									<option value="6">finalist</option>
								<?php } elseif ($video->participant->status->id == 5 && $amount_from1tofrom3_6 == 3) { ?>
									<!-- give option to participant shorlisted when finalist is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($video->participant->status->id == 6 && $amount_from1tofrom3_6 == 3 && $amount_from1tofrom3_7 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is NOT full-->
									<option value="1">disqualified</option>
									<option value="7">bronze</option>
								<?php } elseif ($video->participant->status->id == 6  && $amount_from1tofrom3_6 == 3 && $amount_from1tofrom3_7 == 1 && $amount_from1tofrom3_8 == null){ ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is NOT full-->
									<option value="1">disqualified</option>
									<option value="8">silver</option>
								<?php } elseif ($video->participant->status->id == 6  && $amount_from1tofrom3_6 == 3 &&  $amount_from1tofrom3_7 == 1 && $amount_from1tofrom3_8 == 1 && $amount_from1tofrom3_9 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is full, gold is NOT full-->
									<option value="1">disqualified</option>
									<option value="9">gold</option>
								<?php }
								if ($video->participant->status->id == 7 || $video->participant->status->id == 8 || $video->participant->status->id == 9 || $video->participant->status->id == 10) { ?>
									<!-- give option to participant already get result-->
									<option value="1">disqualified</option>
								<?php } ?>
								@else 
								<?php
								if ($video->participant->status->id == 4 && $amount_from4tofrom6_5 < 4) { ?>
									<!-- give option to participant reviewing when shortlisted is NOT full-->
									<option value="1">disqualified</option>
									<option value="5">shortlisted</option>
									<option value="10">unfortune</option>
								<?php } elseif ($video->participant->status->id == 4 &&  $amount_from4tofrom6_5 == 4) { ?>
									<!-- give option to participant reviewing when shortlisted is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($video->participant->status->id == 5 && $amount_from4tofrom6_6 < 3) { ?>
									<!-- give option to participant shortlisted when finalist is NOT full -->
									<option value="1">disqualified</option>
									<option value="6">finalist</option>
								<?php } elseif ($video->participant->status->id == 5 && $amount_from4tofrom6_6 == 3) { ?>
									<!-- give option to participant shorlisted when finalist is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($video->participant->status->id == 6 && $amount_from4tofrom6_6 == 3 && $amount_from4tofrom6_7 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is NOT full-->
									<option value="1">disqualified</option>
									<option value="7">bronze</option>
								<?php } elseif ($video->participant->status->id == 6  && $amount_from4tofrom6_6 == 3 && $amount_from4tofrom6_7 == 1 && $amount_from4tofrom6_8 == null){ ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is NOT full-->
									<option value="1">disqualified</option>
									<option value="8">silver</option>
								<?php } elseif ($video->participant->status->id == 6  && $amount_from4tofrom6_6 == 3 &&  $amount_from4tofrom6_7 == 1 && $amount_from4tofrom6_8 == 1 && $amount_from4tofrom6_9 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is full, gold is NOT full-->
									<option value="1">disqualified</option>
									<option value="9">gold</option>
								<?php }
								if ($video->participant->status->id == 7 || $video->participant->status->id == 8 || $video->participant->status->id == 9 || $video->participant->status->id == 10) { ?>
									<!-- give option to participant already get result-->
									<option value="1">disqualified</option>
								<?php } ?>
								@endif
							</select>
						</div>
						<div style="display: inline-block;" class="py-3 float-right">
							<button wire:click.prevent="confirmDeleteProposal({{$video->id}})" type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<button type="button" class="py-3 collapsible">show details</button>

					<div class="content">
						<div class="row py-4">
							<div class="col bloc">
								<div class="py-2">
									<button wire:click="export({{$video->id}})" style="color: red">
										Proposal pdf
									</button>
								</div>
								@if($video->final_file != null)
								<div class="py-2">
									<button wire:click="exportFinalPorposal({{$video->id}})" style="color: red">
										Final Proposal pdf
									</button>
								</div>
								@endif
								<div>
									@foreach($video->participant->group->group_members as $members)
									<p class="card-view">{{$members->group_members_name}} </p>
									@endforeach
								</div>
							</div>
							<div class="col">
								<iframe width="450" height="240" src="{{$video->video_link}}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endforeach

		@elseif($groupby == 'group')
		@foreach($groups as $group)
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div class="bloc ml-6">
								{{$group->groups_invention_name}}
							</div>
						</div>
						<div class="col">
							<div id="bloc_paticipant_name">
								Participant:
							</div>
							<div class="bloc">
								{{$group->participant->participant_name}}
							</div>
						</div>
						<div class="col col-lg-2 text-right">
							<div id="">
								{{$group->participant->video->updated_at}}
							</div>
						</div>
					</div>
					<div class="py-2">
						<div class="py-2" style="display: inline-block;">
							<select wire:model.defer="selectedstatus" wire:change="updStatus({{$group->participant->id}},'{{$group->participant->participant_name}}')" class="rounded border" aria-label="Default select example" style="display: inline-block; width: 200px;">
								<option selected>{{$group->participant->status->statuses_name}}</option>
								@if($group->groups_age_categories == 'from1-from3')
								<?php
								if ($group->participant->status->id == 4 && $amount_from1tofrom3_5 < 4) { ?>
									<!-- give option to participant reviewing when shortlisted is NOT full-->
									<option value="1">disqualified</option>
									<option value="5">shortlisted</option>
									<option value="10">unfortune</option>
								<?php } elseif ($group->participant->status->id == 4 &&  $amount_from1tofrom3_5 == 4) { ?>
									<!-- give option to participant reviewing when shortlisted is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($group->participant->status->id == 5 && $amount_from1tofrom3_6 < 3) { ?>
									<!-- give option to participant shortlisted when finalist is NOT full -->
									<option value="1">disqualified</option>
									<option value="6">finalist</option>
								<?php } elseif ($group->participant->status->id == 5 && $amount_from1tofrom3_6 == 3) { ?>
									<!-- give option to participant shorlisted when finalist is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($group->participant->status->id == 6 && $amount_from1tofrom3_6 == 3 && $amount_from1tofrom3_7 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is NOT full-->
									<option value="1">disqualified</option>
									<option value="7">bronze</option>
								<?php } elseif ($group->participant->status->id == 6  && $amount_from1tofrom3_6 == 3 && $amount_from1tofrom3_7 == 1 && $amount_from1tofrom3_8 == null){ ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is NOT full-->
									<option value="1">disqualified</option>
									<option value="8">silver</option>
								<?php } elseif ($group->participant->status->id == 6  && $amount_from1tofrom3_6 == 3 &&  $amount_from1tofrom3_7 == 1 && $amount_from1tofrom3_8 == 1 && $amount_from1tofrom3_9 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is full, gold is NOT full-->
									<option value="1">disqualified</option>
									<option value="9">gold</option>
								<?php }
								if ($group->participant->status->id == 7 || $group->participant->status->id == 8 || $group->participant->status->id == 9 || $group->participant->status->id == 10) { ?>
									<!-- give option to participant already get result-->
									<option value="1">disqualified</option>
								<?php } ?>
								@else 
								<?php
								if ($group->participant->status->id == 4 && $amount_from4tofrom6_5 < 4) { ?>
									<!-- give option to participant reviewing when shortlisted is NOT full-->
									<option value="1">disqualified</option>
									<option value="5">shortlisted</option>
									<option value="10">unfortune</option>
								<?php } elseif ($group->participant->status->id == 4 &&  $amount_from4tofrom6_5 == 4) { ?>
									<!-- give option to participant reviewing when shortlisted is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($group->participant->status->id == 5 && $amount_from4tofrom6_6 < 3) { ?>
									<!-- give option to participant shortlisted when finalist is NOT full -->
									<option value="1">disqualified</option>
									<option value="6">finalist</option>
								<?php } elseif ($group->participant->status->id == 5 && $amount_from4tofrom6_6 == 3) { ?>
									<!-- give option to participant shorlisted when finalist is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($group->participant->status->id == 6 && $amount_from4tofrom6_6 == 3 && $amount_from4tofrom6_7 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is NOT full-->
									<option value="1">disqualified</option>
									<option value="7">bronze</option>
								<?php } elseif ($group->participant->status->id == 6  && $amount_from4tofrom6_6 == 3 && $amount_from4tofrom6_7 == 1 && $amount_from4tofrom6_8 == null){ ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is NOT full-->
									<option value="1">disqualified</option>
									<option value="8">silver</option>
								<?php } elseif ($group->participant->status->id == 6  && $amount_from4tofrom6_6 == 3 &&  $amount_from4tofrom6_7 == 1 && $amount_from4tofrom6_8 == 1 && $amount_from4tofrom6_9 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is full, gold is NOT full-->
									<option value="1">disqualified</option>
									<option value="9">gold</option>
								<?php }
								if ($group->participant->status->id == 7 || $group->participant->status->id == 8 || $group->participant->status->id == 9 || $group->participant->status->id == 10) { ?>
									<!-- give option to participant already get result-->
									<option value="1">disqualified</option>
								<?php } ?>
								@endif
							</select>
						</div>
						<div style="display: inline-block;" class="py-3 float-right">
							<button wire:click.prevent="confirmDeleteProposal({{$group->participant->video->id}})" type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<button type="button" class="py-3 collapsible">show details</button>

					<div class="content">
						<div class="row py-4">
							<div class="col bloc">
								<div class="py-2">
									<button wire:click="export({{$group->participant->video->id}})" style="color: red">
										Proposal pdf
									</button>
								</div>
								@if($group->participant->video->final_file != null)
								<div class="py-2">
									<button wire:click="exportFinalPorposal({{$group->participant->video->id}})" style="color: red">
										Final Proposal pdf
									</button>
								</div>
								@endif
								<div>
									@foreach($group->group_members as $members)
									<p class="card-view">{{$members->group_members_name}} </p>
									@endforeach
								</div>
							</div>
							<div class="col">
								<iframe width="450" height="240" src="{{$group->participant->video->video_link}}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endforeach

		@else
		@foreach($participants as $participant)
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div class="bloc ml-6">
								{{$participant->group->groups_invention_name}}
							</div>
						</div>
						<div class="col">
							<div id="bloc_paticipant_name">
								Participant:
							</div>
							<div class="bloc">
								{{$participant->participant_name}}
							</div>
						</div>
						<div class="col col-lg-2 text-right">
							<div id="">
								{{$participant->video->updated_at}}
							</div>
						</div>
					</div>
					<div class="py-2">
						<div class="py-2" style="display: inline-block;">
							<select wire:model.defer="selectedstatus" wire:change="updStatus({{$participant->video->participant->id}},'{{$participant->video->participant->participant_name}}')" class="rounded border" aria-label="Default select example" style="display: inline-block; width: 200px;">
								<option selected>{{$participant->status->statuses_name}}</option>
								@if($participant->group->groups_age_categories == 'from1-from3')
								<?php
								if ($participant->status->id == 4 && $amount_from1tofrom3_5 < 4) { ?>
									<!-- give option to participant reviewing when shortlisted is NOT full-->
									<option value="1">disqualified</option>
									<option value="5">shortlisted</option>
									<option value="10">unfortune</option>
								<?php } elseif ($participant->status->id == 4 &&  $amount_from1tofrom3_5 == 4) { ?>
									<!-- give option to participant reviewing when shortlisted is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($participant->status->id == 5 && $amount_from1tofrom3_6 < 3) { ?>
									<!-- give option to participant shortlisted when finalist is NOT full -->
									<option value="1">disqualified</option>
									<option value="6">finalist</option>
								<?php } elseif ($participant->status->id == 5 && $amount_from1tofrom3_6 == 3) { ?>
									<!-- give option to participant shorlisted when finalist is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($participant->status->id == 6 && $amount_from1tofrom3_6 == 3 && $amount_from1tofrom3_7 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is NOT full-->
									<option value="1">disqualified</option>
									<option value="7">bronze</option>
								<?php } elseif ($participant->status->id == 6  && $amount_from1tofrom3_6 == 3 && $amount_from1tofrom3_7 == 1 && $amount_from1tofrom3_8 == null){ ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is NOT full-->
									<option value="1">disqualified</option>
									<option value="8">silver</option>
								<?php } elseif ($participant->status->id == 6  && $amount_from1tofrom3_6 == 3 &&  $amount_from1tofrom3_7 == 1 && $amount_from1tofrom3_8 == 1 && $amount_from1tofrom3_9 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is full, gold is NOT full-->
									<option value="1">disqualified</option>
									<option value="9">gold</option>
								<?php }
								if ($participant->status->id == 7 || $participant->status->id == 8 || $participant->status->id == 9 || $participant->status->id == 10) { ?>
									<!-- give option to participant already get result-->
									<option value="1">disqualified</option>
								<?php } ?>
								@else 
								<?php
								if ($participant->status->id == 4 && $amount_from4tofrom6_5 < 4) { ?>
									<!-- give option to participant reviewing when shortlisted is NOT full-->
									<option value="1">disqualified</option>
									<option value="5">shortlisted</option>
									<option value="10">unfortune</option>
								<?php } elseif ($participant->status->id == 4 &&  $amount_from4tofrom6_5 == 4) { ?>
									<!-- give option to participant reviewing when shortlisted is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($participant->status->id == 5 && $amount_from4tofrom6_6 < 3) { ?>
									<!-- give option to participant shortlisted when finalist is NOT full -->
									<option value="1">disqualified</option>
									<option value="6">finalist</option>
								<?php } elseif ($participant->status->id == 5 && $amount_from4tofrom6_6 == 3) { ?>
									<!-- give option to participant shorlisted when finalist is full-->
									<option value="1">disqualified</option>
									<option value="10">unfortune</option>
								<?php } elseif ($participant->status->id == 6 && $amount_from4tofrom6_6 == 3 && $amount_from4tofrom6_7 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is NOT full-->
									<option value="1">disqualified</option>
									<option value="7">bronze</option>
								<?php } elseif ($participant->status->id == 6  && $amount_from4tofrom6_6 == 3 && $amount_from4tofrom6_7 == 1 && $amount_from4tofrom6_8 == null){ ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is NOT full-->
									<option value="1">disqualified</option>
									<option value="8">silver</option>
								<?php } elseif ($participant->status->id == 6  && $amount_from4tofrom6_6 == 3 &&  $amount_from4tofrom6_7 == 1 && $amount_from4tofrom6_8 == 1 && $amount_from4tofrom6_9 == null) { ?>
									<!-- give option to participant finalist when finalist is full, bronze is full, silver is full, gold is NOT full-->
									<option value="1">disqualified</option>
									<option value="9">gold</option>
								<?php }
								if ($participant->status->id == 7 || $participant->status->id == 8 || $participant->status->id == 9 || $participant->status->id == 10) { ?>
									<!-- give option to participant already get result-->
									<option value="1">disqualified</option>
								<?php } ?>
								@endif
							</select>
						</div>
						<div style="display: inline-block;" class="py-3 float-right">
							<button wire:click.prevent="confirmDeleteProposal({{$participant->video->id}})" type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<button type="button" class="py-3 collapsible">show details</button>

					<div class="content">
						<div class="row py-4">
							<div class="col bloc">
								<div class="py-2">
									<button wire:click="export({{$participant->video->id}})" style="color: red">
										Proposal pdf
									</button>
								</div>
								@if($participant->video->final_file != null)
								<div class="py-2">
									<button wire:click="exportFinalPorposal({{$participant->video->id}})" style="color: red">
										Final Proposal pdf
									</button>
								</div>
								@endif
								<div>
									@foreach($participant->group->group_members as $members)
									<p class="card-view">{{$members->group_members_name}} </p>
									@endforeach
								</div>
							</div>
							<div class="col">
								<iframe width="450" height="240" src="{{$participant->video->video_link}}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endforeach
		@endif
	</div>

	@else
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
			
			<!-- sorting by status-->
			<div style="display: inline-block;">
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 200px;" wire:model.debounce.500ms="groupby">
					<option selected>orderby status</option>
					<option value="video">all</option>
					<option value="1">Disqualified({{$participant_status_count_1}})</option>
					<option value="10">Unfortune({{$participant_status_count_10}})</option>
					<option value="2">Registered({{$participant_status_count_2}})</option>
					<option value="4">Reviewing({{$participant_status_count_4}})</option>
					<option value="5">Shortlisted({{$participant_status_count_5}})</option>
					<option value="6">Finalist({{$participant_status_count_6}})</option>
					<option value="7">Bronze({{$participant_status_count_7}})</option>
					<option value="8">Silver({{$participant_status_count_8}})</option>
					<option value="9">Gold({{$participant_status_count_9}})</option>
				</select>

			</div>

			<!-- sorting by time-->
			<div style="display: inline-block;">
				@if($groupby == 'video')
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 120px;" wire:model="sortVideoDirection">
					<option selected>orderby Date</option>
					<option value="desc">Latest</option>
					<option value="asc">Earliest</option>
				</select>
				@else
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 120px;" wire:model="sortParticipantDirection">
					<option selected>orderby Date</option>
					<option value="desc">Latest</option>
					<option value="asc">Earliest</option>
				</select>
				@endif
			</div>

			<!-- sorting by age categories-->
			<div style="display: inline-block;">
				<select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 200px;" wire:model="sortCategoryDirection">
					<option selected>sort by categories</option>
					<option value="from1-from3">From1 - 3</option>
					<option value="from4-from6">From4 - 6</option>
				</select>
			</div>
		</div>

		@if($groupby == 'video')
		@foreach($videos as $video)
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div class="bloc ml-6">
								{{$video->participant->group->groups_invention_name}}
							</div>
						</div>
						<div class="col">
							<div id="bloc_paticipant_name">
								Participant:
							</div>
							<div class="bloc">
								{{$video->participant->participant_name}}
							</div>
						</div>
						<div class="col col-lg-2 text-right">
							<div id="">
								{{$video->updated_at}}
							</div>
						</div>
					</div>
					
					<div class="py-2">
						<div class="py-2" style="display: inline-block;">
							<select disabled wire:model.defer="selectedstatus" wire:change="updStatus({{$video->participant->id}},'{{$video->participant->participant_name}}')" class="rounded border" aria-label="Default select example" style="display: inline-block; width: 200px;">
								<option selected>{{$video->participant->status->statuses_name}}</option>
							</select>
						</div>
						<div style="display: inline-block;" class="py-3 float-right">
							<button wire:click.prevent="confirmDeleteProposal({{$video->id}})" type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<button type="button" class="py-3 collapsible">show details</button>

					<div class="content">
						<div class="row py-4">
							<div class="col bloc">
								<div class="py-2">
									<button wire:click="export({{$video->id}})" style="color: red">
										Proposal pdf
									</button>
								</div>
								@if($video->final_file != null)
								<div class="py-2">
									<button wire:click="exportFinalPorposal({{$video->id}})" style="color: red">
										Final Proposal pdf
									</button>
								</div>
								@endif
								<div>
									@foreach($video->participant->group->group_members as $members)
									<p class="card-view">{{$members->group_members_name}} </p>
									@endforeach
								</div>
							</div>
							<div class="col">
								<iframe width="450" height="240" src="{{$video->video_link}}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endforeach

		@elseif($groupby == 'group')
		@foreach($groups as $group)
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div class="bloc ml-6">
								{{$group->groups_invention_name}}
							</div>
						</div>
						<div class="col">
							<div id="bloc_paticipant_name">
								Participant:
							</div>
							<div class="bloc">
								{{$group->participant->participant_name}}
							</div>
						</div>
						<div class="col col-lg-2 text-right">
							<div id="">
								{{$group->participant->video->updated_at}}
							</div>
						</div>
					</div>
					<div class="py-2">
						<div class="py-2" style="display: inline-block;">
							<select disabled wire:model.defer="selectedstatus" wire:change="updStatus({{$group->participant->id}},'{{$group->participant->participant_name}}')" class="rounded border" aria-label="Default select example" style="display: inline-block; width: 200px;">
								<option selected>{{$group->participant->status->statuses_name}}</option>
							</select>
						</div>
						<div style="display: inline-block;" class="py-3 float-right">
							<button wire:click.prevent="confirmDeleteProposal({{$group->participant->video->id}})" type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<button type="button" class="py-3 collapsible">show details</button>

					<div class="content">
						<div class="row py-4">
							<div class="col bloc">
								<div class="py-2">
									<button wire:click="export({{$group->participant->video->id}})" style="color: red">
										Proposal pdf
									</button>
								</div>
								@if($group->participant->video->final_file != null)
								<div class="py-2">
									<button wire:click="exportFinalPorposal({{$group->participant->video->id}})" style="color: red">
										Final Proposal pdf
									</button>
								</div>
								@endif
								<div>
									@foreach($group->group_members as $members)
									<p class="card-view">{{$members->group_members_name}} </p>
									@endforeach
								</div>
							</div>
							<div class="col">
								<iframe width="450" height="240" src="{{$group->participant->video->video_link}}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endforeach

		@else
		@foreach($participants as $participant)
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="form-group bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="container p-6">
					<div class="row">
						<div class="col">
							<div class="bloc ml-6">
								{{$participant->group->groups_invention_name}}
							</div>
						</div>
						<div class="col">
							<div id="bloc_paticipant_name">
								Participant:
							</div>
							<div class="bloc">
								{{$participant->participant_name}}
							</div>
						</div>
						<div class="col col-lg-2 text-right">
							<div id="">
								{{$participant->video->updated_at}}
							</div>
						</div>
					</div>
					<div class="py-2">
						<div class="py-2" style="display: inline-block;">
							<select disabled wire:model.defer="selectedstatus" wire:change="updStatus({{$participant->video->participant->id}},'{{$participant->video->participant->participant_name}}')" class="rounded border" aria-label="Default select example" style="display: inline-block; width: 200px;">
								<option selected>{{$participant->status->statuses_name}}</option>
							</select>
						</div>
						<div style="display: inline-block;" class="py-3 float-right">
							<button wire:click.prevent="confirmDeleteProposal({{$participant->video->id}})" type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<button type="button" class="py-3 collapsible">show details</button>

					<div class="content">
						<div class="row py-4">
							<div class="col bloc">
								<div class="py-2">
									<button wire:click="export({{$participant->video->id}})" style="color: red">
										Proposal pdf
									</button>
								</div>
								@if($participant->video->final_file != null)
								<div class="py-2">
									<button wire:click="exportFinalPorposal({{$participant->video->id}})" style="color: red">
										Final Proposal pdf
									</button>
								</div>
								@endif
								<div>
									@foreach($participant->group->group_members as $members)
									<p class="card-view">{{$members->group_members_name}} </p>
									@endforeach
								</div>
							</div>
							<div class="col">
								<iframe width="450" height="240" src="{{$participant->video->video_link}}" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		@endforeach
		@endif
	</div>
	@endif

	<!-- delete more Modal -->
	@include('modal.deleteProposal_modal')

	<script src="{{ asset('js/expanding-manage-dashboard.js') }}"></script>
</div>