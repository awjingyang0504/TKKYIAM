<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Models\Activity;
use App\Models\Video;
use App\Models\Participant;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Response;
use App\Models\Webpage;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    use WithFileUploads;

    public $isActive_RegisterCompetition = false;

    public $video_id, $video_link, $video_updated;
    public $participant_name, $participant_id, $participant_status;
    public $file;

    public $flashMessage = false; 

    public $group_id, $group_name, $group_member_name = array();
    public $rules = [
        'video_link' => '',
        'file' => '',
    ];

    public function mount()
    {
        $isActive_webpage = Webpage::where('webpages_name','Register Competition')->first();
        if($isActive_webpage->isActive == '1'){
            $this->isActive_RegisterCompetition = true;
        }else{
            $this->isActive_RegisterCompetition = false;
        }

        $user_id = auth()->user()->id;
        $participant = Participant::where('user_id', $user_id)->first();
        if ($participant != null) {
            $this->participant_id = $participant->id;
            $this->participant_status = $participant->status_id;

            $video = Video::where('participant_id', $this->participant_id)->first();
            if ($video != null) {
                $this->video_id = $video->id;
            }
        }
    }

    public function flashM(){
        set_time_limit(3);
        ini_set('max_execution_time', 3); 
    }

    public function render()
    {
        if (Gate::denies('RegisterCompetition')) {
            abort(403);
        }

        return view('livewire.dashboard', [
            'groups' => Group::all(),
            'participants' => Participant::all(),
            'videos' => Video::where('participant_id', $this->participant_id)->first()
        ])
            ->with('g', $this->group_member_name);
    }

    public function submitProposal()
    {
        $this->dispatchBrowserEvent('show_submit_proposalform');
    }

    public function submitFinalProposal()
    {
        $this->dispatchBrowserEvent('show_submit_finalproposalform');
    }

    public function updateProposal()
    {
        $this->dispatchBrowserEvent('show_update_proposalform');
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

    function getYoutubeEmbedUrl($action)
    {

        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $this->video_link, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $this->video_link, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        $this->video_link = 'https://www.youtube.com/embed/' . $youtube_id;

        if ($action == 'create') {
            return $this->submitForm();
        } else {
            return $this->updateForm();
        }
    }

    public function submitForm()
    {
        $this->validate();

        $file = $this->file;
        //dd(time(). '.' . $file->getClientOriginalExtension());
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $this->file->storeAs('file', $filename);

        Video::create([
            'participant_id' => $this->participant_id,
            'video_link' => $this->video_link,
            'file' => $filename,
        ]);
        $update = Participant::find($this->participant_id)->update([
            'status_id' => 4,
        ]);
        if ($update) {
            $this->participant_status = 4;
            $this->mount();
            $this->dispatchBrowserEvent('hide_submit_proposalform');

            $this->flashMessage = true;
            session()->flash('message', 'Proposal has successfully uploaded.');
        }
    }

    public function submitFinalForm()
    {
        $this->validate();

        $file = $this->file;
        //dd(time(). '.' . $file->getClientOriginalExtension());
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $this->file->storeAs('file', $filename);

        $create = Video::find($this->video_id)->update([
            'final_file' => $filename,
        ]);
        if ($create) {
            //Create activity
            $activity = new Activity();
            $activity->admin_name = null;
            $activity->user_name = $this->participant_name;
            $activity->activities_summary = 'has upload final report';
            $activity->save();
            $this->mount();
            $this->dispatchBrowserEvent('hide_submit_finalproposalform');

            $this->flashMessage = true;
            session()->flash('message', 'Final Proposal has successfully uploaded.');
        }
    }

    public function updateForm()
    {
        $this->validate();

        $file = $this->file;
        //dd(time(). '.' . $file->getClientOriginalExtension());
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $this->file->storeAs('file', $filename);

        $update = Video::find($this->video_id)->update([
            'video_link' => $this->video_link,
            'file' => $filename,
        ]);
        if ($update) {
            $this->dispatchBrowserEvent('hide_update_proposalform');
            $this->flashMessage = true;
            session()->flash('message', 'Proposal has successfully updated.');
        }
    }

    public function download($Attachment)
    {
        $file = Video::find($Attachment);
        return response()->download(base_path($file));
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

    public function refreshComponent()
    {
        $this->update = !$this->update;
    }
}
