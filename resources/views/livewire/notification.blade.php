<div>
@include('layouts.partials.homelivewirenavbar')
    <div class="container">

        <div class="py-12">
		<h1 class="text-center text-primary mt-2">Notification</h1>
        </div>
        
        <div class="mt-5">
            <div class="card border-primary">
                <div class="card-header bg-primary d-flex justify-content-between" >
                    <span><h3>All Notes ( {{count($total_information)}} )</h3></span>
                </div>
            </div>
        </div>
        

        @if ($selectData == true)
        <div class="d-flex justify-content-end">
            <input type="text" wire:model='search' name="search" id="search" placeholder="Search Here ...." class="form-control form-control-lg mt-2 w-50">
        </div>
        {{--$search--}}
        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Dated</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($infos as $notifications)
                    <tr>
                        <td>{{$notifications->id}}</td>
                        <td>{{$notifications->title}}</td>
                        <td>{{$notifications->note}}</td>
                        <td>{{$notifications->date}}</td>
                        <td><p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$notifications->created_at->diffForHumans()}}</p></td>
                    </tr>
                    @empty
                        <h1>Record not found</h1>
                    @endforelse
                </tbody>
            </table>

            <div class="text-center">
                {{$infos->links()}}
            </div>
        </div>
        @endif


    </div>
</div>