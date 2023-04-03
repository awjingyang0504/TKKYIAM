<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;
use App\Models\Participant;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ParticipantList extends Component
{
    public $search;
    public $sortColumnName = 'updated_at';
    public $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.participant-list', [
            'groups' => Group::all(),
            'videos' => Video::all(),
            'participants' => Participant::when($this->search, function ($query, $search) {
                return $query->where('participant_name', 'LIKE', "%$search%");
            })
                ->orderBy($this->sortColumnName, $this->sortDirection)
                ->paginate(20)

        ]);
    }

    public function updatedSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function readProposal($id)
    {
        $video = Video::where('id', $id)->first();
        $this->participant_id = $video->participant_id;

        $participant = Participant::where('id', $this->participant_id)->first();
        $this->group_id = $participant->group_id;

        $group = Group::where('id', $this->group_id)->first();

        $group_member_order = array();
        $group_member = DB::table('group_members')->where('group_id', $this->group_id)->get();
        foreach ($group_member as $group_members) {
            $group_member_order[] = array(
                $group_members->group_members_name,
            );
        }

        $this->group_name = $group->groups_invention_name;
        $this->group_member_name =  $group_member_order;
        $this->participant_name = $participant->participant_name;
        $this->video_link = $video->video_link;

        $this->dispatchBrowserEvent('show_read_proposalform', [
            'id' => $id,
        ]);
    }

    public function export($id)
    {
        $file = Video::find($id);
        $path = storage_path() . '/' . 'app' . '/file/' . $file->file;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }
}
