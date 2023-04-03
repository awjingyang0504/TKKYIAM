<div wire:ignore.self class="modal fade" id="read_proposalform" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proposal Details</h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>
                                <p>{{$this->group_name}} </p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <p>{{$this->participant_name}} </p>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                @foreach($g as $gname)
                                <p>{{$gname[0]}} </p>
                                @endforeach 
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <iframe src="{{$this->video_link}}" frameborder="0" allowfullscreen></iframe>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>