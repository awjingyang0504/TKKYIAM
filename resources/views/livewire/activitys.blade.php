<div>
@include('layouts.partials.dashboardnavbar')
<div class="p-3 mb-2 bg-white text-dark">
    <div class="container">

        <div class="py-12">
            <h1 class="text-center text-black mt-2">Activity</h1>
        </div>

    <div class="mt-5">
        <div class="card border-primary">
            <div class="card-header bg-primary d-flex justify-content-between" >
                <span><h3>All Activity ( {{count($total_activity)}} )</h3></span>
            </div>
        </div>
    </div>
    
        
        @if ($selectData == true)
        <div class="d-flex justify-content-end">
            <input type="text" wire:model='search' name="search" id="search" placeholder="Search Username Here..." class="form-control form-control-lg mt-2 w-50">
        </div>

        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Id</th>
                        <th>Admin Name</th>
                        <th>User Name</th>
                        <th>Activities Summary</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($activities as $activity)
                    <tr>
                        <td>{{$activity->id}}</td>
                        <td>{{$activity->admin_name}}</td>
                        <td>{{$activity->user_name}}</td>
                        <td>{{$activity->activities_summary}}</td>
                        <td><p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$activity->created_at->diffForHumans()}}</p></td>
                    </tr>
                    @empty
                        <h1>Record not found</h1>
                    @endforelse
                </tbody>
            </table>

            <div class="text-center">
                {{$activities->links()}}
            </div>
        </div>
        @endif 
    </div> 
</div>
</div>