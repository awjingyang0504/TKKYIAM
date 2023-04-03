<div>
@include('layouts.partials.dashboardnavbar')
    <!DOCTYPE html>
    <html lang="en">
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
                <table class="table table-bordered">
                    <tr class="bg-dark text-white">
                        <th>ID</th>
                        <th>Webapage name</th>
                        <th>Status</th>
                    </tr>
                    @foreach($webpages as $webpage)
                    <tr>
                        <td>{{ $webpage->id }}</td>
                        <td>{{ $webpage->webpages_name }}</td>
                        <td>
                            @livewire('manage-competitions', ['model' => $webpage, 'field' => 'isActive'], key($webpage->id))
                        </td>
                        @endforeach
                    </tr>
                </table>

                <h2 style="color:blue;">Upload 2022 Result</h2>
                @if($isActive_UploadResult == true)
                <form action="" wire:submit.prevent='create'>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Enter Year</b></label>
                            <input type="text" wire:model='title' name="title" id="title" class="form-control form-control-lg">
                            <span class="text-danger">
                                @error('title')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <label for="upload_file"><b>Upload File</b></label>
                        <div class="form-group">
                            <input type="file" class="form-control rounded border" placeholder="Please provide your pdf proposal" wire:model="file" required>
                            @error('file')
                            <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                            @enderror
                            <div wire:loading wire:target="file">Uploading...</div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
                @else
                <form action="" wire:submit.prevent='create'>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Enter Year</b></label>
                            <input readonly type="text" wire:model='title' name="title" id="title" class="form-control form-control-lg">
                            <span class="text-danger">
                                @error('title')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <label for="upload_file"><b>Upload File</b></label>
                        <div class="form-group">
                            <input readonly type="file" class="form-control rounded border" placeholder="Please provide your pdf proposal" wire:model="file" required>
                            @error('file')
                            <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                            @enderror
                            <div wire:loading wire:target="file">Uploading...</div>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
    </body>

    </html>
</div>