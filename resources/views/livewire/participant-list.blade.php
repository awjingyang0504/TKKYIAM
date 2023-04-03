<div>
<link href="{{ asset('css/expanding.css') }}" rel="stylesheet">
@include('layouts.partials.homelivewirenavbar')
    <div class="wrapper">
        <!-- Card navigationbar -->
        <div class="container-fluid">
            <div class="py-4" style="display: inline-block; width: 55%;">
                <input type="text" wire:model="search" class="form-control py-2 px-4 rounded border" placeholder="Search participant name" wire:model.debounce.350ms="search">
            </div>
            <div class="py-4 float-right">
                <select class="rounded border " aria-label="Default select example" style="display: inline-block; width: 120px;" wire:model="sortDirection">
                    <option selected>orderby  Date</option>
                    <option value="desc">Latest</option>
                    <option value="asc">Earliest</option>
                </select>
            </div>
        </div>

        @foreach($participants as $participant)
        @if($participant->video == null)
        <div class="card">
            <div class="card-view">
                <div style="display: inline-block;">
                    <h3 class="card-view">{{$participant->group->groups_invention_name}}</h3>
                    <p class="card-view">{{$participant->participant_name}}</p>
                    @foreach($participant->group->group_members as $members)
                    <p class="card-view">{{$members->group_members_name}} </p>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-view">
                <div style="display: inline-block;">
                    <h3 class="card-view">{{$participant->group->groups_invention_name}}</h3>
                    <p class="card-view">{{$participant->video->updated_at}}</p>
                    <p class="card-view">{{$participant->participant_name}}</p>
                    @foreach($participant->group->group_members as $members)
                    <p class="card-view">{{$members->group_members_name}} </p>
                    @endforeach
                </div>
                <div style="display: inline-block; margin-left: 15%;">
                    <iframe width="450" height="240" src="{{$participant->video->video_link}}" frameborder="0" allowfullscreen></iframe>
                    <button wire:click="export({{$participant->video->id}})" style="color: red; margin: auto;">
                        Proposal pdf
                    </button>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <script src="{{ asset('js/expanding.js') }}"></script>
</div>