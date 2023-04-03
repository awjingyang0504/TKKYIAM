<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Models\Video;
use App\Models\Participant;
use App\Models\Group;
use App\Models\Status;
use App\Models\Webpage;
use Illuminate\Support\Facades\Response;

class ManageDashboard extends Component
{
    public $isActive_ManageParticipant = false;

    public $video_id, $video_link, $video_updated;
    public $participant_name, $participant_id, $participant_status;
    public $group_id, $group_name, $group_member_name = array();
    public $videoIdBeingRemoved = null;
    public $selectedstatus = null;

    public $participant_status_array = array();

    public $participant_status_count_1, $participant_status_count_2, 
    $participant_status_count_4, $participant_status_count_5, 
    $participant_status_count_6, $participant_status_count_7,
    $participant_status_count_8, $participant_status_count_9, $participant_status_count_10;

    public $amount_from1tofrom3_5, $amount_from1tofrom3_6,$amount_from1tofrom3_7, $amount_from1tofrom3_8, $amount_from1tofrom3_9;
    public $amount_from4tofrom6_5, $amount_from4tofrom6_6,$amount_from4tofrom6_7, $amount_from4tofrom6_8, $amount_from4tofrom6_9;

    public $search;
    public $groupby = 'video';
    public $sortCategoryDirection = '';
    public $sortVideoDirection = 'desc';
    public $sortParticipantDirection = 'desc';

    public function mount()
    {
        $isActive_webpage = Webpage::where('webpages_name','Manage Participant Status')->first();
        if($isActive_webpage->isActive == '1'){
            $this->isActive_ManageParticipant = true;
        }else{
            $this->isActive_ManageParticipant = false;
        }

        //call store function first
        if (count($this->participant_status_array) != 0) {
            $this->participant_status_array = array();
            $this->store();
        } else {
            $this->store();
        }

        for($i=5 ; $i <= 9; $i++){
            $amount_statuses = Status::where('id',$i)->first();
            $this->{'amount_from1tofrom3_'.$i} =  $amount_statuses->amount_from1tofrom3;
            $this->{'amount_from4tofrom6_'.$i} =  $amount_statuses->amount_from4tofrom6;
        }
    }

    public function render()
    {
        if (Gate::denies('ManageandActivity')) {
            abort(403);
        }
        return view('livewire.manage-dashboard', [
            'groups' => Group::when($this->sortCategoryDirection, function ($query, $sortCategoryDirection) {
                return $query->where('groups_age_categories', 'LIKE', "%$sortCategoryDirection%");
            })
                ->paginate(20),

            'videos' => Video::orderBy('updated_at', $this->sortVideoDirection)
                ->get(),

            'participants' => Participant::when($this->groupby, function ($query, $groupby) {
                return $query->where('status_id', 'LIKE', "%$groupby%");
            })
                ->orderBy('updated_at', $this->sortParticipantDirection)
                ->paginate(20)
        ]);
    }

    public function updatedSortCategoryDirection()
    {
        return $this->groupby = 'group';
    }

    public function updatedGroupby()
    {
        $this->sortCategoryDirection = '';
    }

    public function store()
    {
        $participants = Participant::all();
        foreach ($participants as $participant) {

            $this->participant_status_array[] = $participant->status_id;
        }
        $this->participant_status_count = array_count_values($this->participant_status_array);

        for($i=1; $i <= 10; $i ++){
            if (in_array($i, $this->participant_status_array)) {
                $this->{'participant_status_count_'.$i} =  $this->participant_status_count[$i];
            } else {
                $this->{'participant_status_count_'.$i} = 0;
            }
        }
    }

    public function confirmDeleteProposal($id)
    {
        //find participant id
        $video = Video::where('id', $id)->first();
        $this->participant_id = $video->participant_id;
        $participant = Participant::where('id', $this->participant_id)->first();
        $this->participant_id = $participant->id;
        $this->participant_name = $participant->participant_name;

        $this->videoIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show_delete_proposalform');
    }

    public function deleteProposal()
    {
        $video = Video::findOrFail($this->videoIdBeingRemoved);

        //Create activity
        $activity = new Activity();
        $activity->admin_name = auth()->user()->name;
        $activity->user_name = $this->participant_name;
        $activity->activities_summary = 'Proposal removed';
        $activity->save();

        $video->delete();

        $update = Participant::find($this->participant_id)->update([
            'status_id' => 2,
        ]);
        if ($update) {
            $this->dispatchBrowserEvent('hide_delete_proposalform');
        }
    }

    public function export($id)
    {
        $file = Video::find($id);
        $path = storage_path() . '/' . 'app' . '/file/' . $file->file;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    public function exportFinalPorposal($id)
    {
        $file = Video::find($id);
        $path = storage_path() . '/' . 'app' . '/file/' . $file->final_file;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    public function updStatus($participant_id, $participant_name)
    {
        $upd_status = $this->selectedstatus;
        $upd_status_name = Status::find($upd_status);
        $update = Participant::find($participant_id)->update([
            'status_id' => $upd_status,
        ]);
        if ($update) {
            //insert data
            $log = new Activity();
            $log->admin_name = auth()->user()->name;
            $log->user_name = $participant_name;
            $log->activities_summary = 'update status to ' . $upd_status_name->statuses_name;
            $log->save();

            $this->updAmount($participant_id);
            return redirect(request()->header('Referer'));
        }
    }

    public function updAmount($participant_id){
        $upd_status = Status::find($this->selectedstatus);
        $upd_participant = Participant::find($participant_id);
        $upd_group = Group::where('id',$upd_participant->group_id)->first();
        
        if($upd_group->groups_age_categories == 'from1-from3'){
            $upd_amount =  $upd_status->amount_from1tofrom3 + 1;

            $update = Status::find($this->selectedstatus)->update([
                'amount_from1tofrom3' =>  $upd_amount,
            ]);
        }else{
            $upd_amount =  $upd_status->amount_from4tofrom6 + 1;

            $update = Status::find($this->selectedstatus)->update([
                'amount_from4tofrom6' =>  $upd_amount,
            ]);
        }
    }

    public function refreshComponent()
    {
        $this->update = !$this->update;
    }
}
