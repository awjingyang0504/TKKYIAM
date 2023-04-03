<div class="modal fade" id="submit_finalproposalform" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Submit Proposal</h5>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submitFinalForm" method="POST">
                    <div class="form-group">
                        <div class="form-group">
                            <input type="file" class="form-control rounded border" placeholder="Please provide your pdf proposal" wire:model="file" required>
                            @error('file')
                            <p class="text-red-500 text-sm mb-6 -mt-3">{{ $message }}</p>
                            @enderror
                            <div wire:loading wire:target="file">Uploading...</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>