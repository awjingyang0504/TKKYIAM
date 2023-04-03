<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Participant;
use App\Models\Status;
use App\Models\User;
use App\Models\Activity;
use App\Models\Webpage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class RegisterCompetition extends Component
{
    public $isActive_RegisterCompetition = false;

    public $selectedSchool;
    public $groups_invention_name;
    public $groups_age_categories;
    public $group_members_name;
    public $participant_name;
    public $group_id;
    public $selectedStatus;

    public $name;
    public $ic;
    public $inputs = [];
    public $i = 1;

    public function mount(){
        $isActive_webpage = Webpage::where('webpages_name','Register Competition')->first();
        if($isActive_webpage->isActive == '1'){
            $this->isActive_RegisterCompetition = true;
        }else{
            $this->isActive_RegisterCompetition = false;
        }
    }

    public function render()
    {
        if (Gate::denies('RegisterCompetition')) {
            abort(403);
        }

        return view('livewire.register-competition', [
            'schools' => School::all(),
            'groups' => Group::all(),
            'statuses' => Status::all(),

        ]);
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->ic = '';
    }

    public function create()
    { 
        $userId = Auth::user()->id;
        $this->validate([
            'name.0' => 'required',
            'ic.0' => 'required',
            'selectedSchool' => 'required',
            'groups_invention_name' => 'required',
            'groups_age_categories' => 'required',
        ], [
            'name.0.required' => 'please fill in your name',
            'ic.0.required' => 'please fill in your ic number',
            'selectedSchool.required' => 'please select your school',
            'groups_invention_name.required' => 'please fill in your invention name as group name',
            'groups_age_categories.required' => 'please select your age categories',
        ]);

        //save group record
        $group = new Group;
        $group->school_id = $this->selectedSchool;
        $group->groups_invention_name = $this->groups_invention_name;
        $group->groups_age_categories = $this->groups_age_categories;
        $group->save();

       
        //save group members record
        foreach ($this->name as $key => $value) {
            GroupMember::create([
                'group_id' => $group['id'],
                'group_members_name' => $this->name[$key],
                'group_members_ic' => $this->ic[$key]
            ]);
        }

        //save participant record
        $participant = Participant::create([
            'user_id' => auth()->user()->id,
            'group_id' => $group['id'],
            'status_id' => '2',
            'participant_name' => $this->name[0],
        ]);

        if ($participant) {
            $update = User::find($userId)->update([
                'role_id' => 2,
            ]);
            if ($update) {
                //save activity record
                $log = new Activity();
                $log->admin_name = null;
                $log->user_name = auth()->user()->name;
                $log->activities_summary = $log->user_name . ' have register as participant';
                $log->save();

                $this->inputs = [];
                $this->resetInputFields();

                return redirect()->to('/dashboard');
            }
        }
      
    }
}
