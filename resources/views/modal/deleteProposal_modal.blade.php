<div class="modal fade" id="delete_proposalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete Task</h5>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this proposal?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i> Cancel</button>
                    <button type="button" wire:click.prevent="deleteProposal" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete</button>
                </div>
            </div>
        </div>
    </div>