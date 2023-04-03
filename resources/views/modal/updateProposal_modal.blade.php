<div class="modal fade" id="update_proposalform" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Proposal</h5>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="getYoutubeEmbedUrl('update')">
                    <div class="form-group">
                        <label for="">Youtube Link</label>
                        <input type="text" class="form-control rounded border" placeholder="{{$videos->video_link}}" wire:model="video_link" required>
                        @error('video_link')
                        <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <iframe width="" height="" src="{{$videos->video_link}}" frameborder="0" allowfullscreen></iframe> 
                    </div>
                    <div class="form-group">
                            <input type="file" class="form-control rounded border" placeholder="Please provide your pdf proposal" wire:model="file" required>
                            @error('file')
                            <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                            @enderror
                            <div wire:loading wire:target="file">Uploading...</div>
                        </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>