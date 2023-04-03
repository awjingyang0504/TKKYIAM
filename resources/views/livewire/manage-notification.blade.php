<div>
@include('layouts.partials.dashboardnavbar')

<div class="p-3 mb-2 bg-white text-dark">
    <div class="container">

        <div class="py-12">
		<h1 class="text-center text-primary mt-2">Notification</h1>
        </div>
        
        <div class="mt-5">
            <div class="card border-primary">
                <div class="card-header bg-primary d-flex justify-content-between" >
                    <span><h3>All Notes ( {{count($total_information)}} )</h3></span>
                    <button wire:click='showFrom' class="btn btn-light">Create</button>
                </div>
            </div>
        </div>
        
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
        
        @if ($selectData == true)
        <div class="d-flex justify-content-end">
            <input type="text" wire:model='search' name="search" id="search" placeholder="Search Title Here ...." class="form-control form-control-lg mt-2 w-50">
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
                        <th>Action</th>
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
                        <td>
                        <button wire:click='edit({{$notifications->id}})' class="btn btn-success">Edit</button>
                        <button wire:click='delete({{$notifications->id}})' class="btn btn-danger">Delete</button>
                        </td>
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

        @if ($createData == true)
        {{-- create-data --}}
        <div class="row my-5">
            <div class="col-xl-6 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-0">
                <div class="card">
                    <div class="card-header bg-info text-light">
                        <h1>Add New Note</h1>
                    </div>
                    <form action="" wire:submit.prevent='create'>
                        <div class="card-body">
                            <div class="form-group">
                                <label for=""><b>Enter Title</b></label>
                                <input type="text" wire:model='title' name="title" id="title"
                                    class="form-control form-control-lg">
                                <span class="text-danger">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Enter Note</b></label>
                                <input type="text" wire:model='note' name="note" id="note"
                                    class="form-control form-control-lg">
                                <span class="text-danger">
                                    @error('note')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Enter Date</b></label>
                                <input type="text" wire:model='date' name="date" id="date"
                                    class="form-control form-control-lg">
                                <span class="text-danger">
                                    @error('date')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        @if ($updateData == true)
        {{-- update data --}}
        <div class="row my-5">
            <div class="col-xl-6 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-0">
                <div class="card">
                    <div class="card-header">
                        <h1>Update Note</h1>
                    </div>
                    <form action="" wire:submit.prevent='update({{$ids}})' > <!-- class="mt-5"-->
                        <div class="card-body">
                            <div class="form-group">
                                <label for=""><b>Enter Title</b></label>
                                <input type="text" wire:model='edit_title' name="edit_title" id="edit_title" class="form-control form-control-lg">
                                <span class="text-danger">
                                    @error('edit_title')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Enter note</b></label>
                                <input type="text" wire:model='edit_note' name="edit_note" id="edit_note" class="form-control form-control-lg">
                                <span class="text-danger">
                                    @error('edit_note')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for=""><b>Enter Date</b></label>
                                <input type="text" wire:model='edit_date' name="edit_date" id="edit_date" class="form-control form-control-lg">
                                <span class="text-danger">
                                    @error('edit_date')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

</div>