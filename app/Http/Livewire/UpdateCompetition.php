<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Webpage;
use App\Models\Status;
use Illuminate\Support\Facades\Gate;

class UpdateCompetition extends Component
{
    public $isActive_UpdateCompetition = false;

    public $selectedSchool;
    public $groups_invention_name;
    public $groups_age_categories;
    public $group_members_name;
    public $participant_gender;
    public $group_id;

    public $edit_groups_invention_name, $edit_groups_age_categories, $edit_selectedSchool, $edit_group_members_name;

    public $name = [];
    public $ic = [];
    public $inputs = [];
    public $i = 0;

    public $flashMessage = false; 

    public function mount($participant)
    {
        $isActive_webpage = Webpage::where('webpages_name','Register Competition')->first();
        if($isActive_webpage->isActive == '1'){
            $this->isActive_UpdateCompetition = true;
        }else{
            $this->isActive_UpdateCompetition = false;
        }
      
        $this->group_id = $participant->group_id;
        $this->edit_groups_invention_name = $participant->group->groups_invention_name;
        $this->edit_groups_age_categories = $participant->group->groups_age_categories;
        $this->edit_selectedSchool = $participant->group->school->id;

        // $group_members = DB::table('group_members')->where('group_id', $this->group_id)->get();
        foreach (GroupMember::where('group_id', $this->group_id)->get() as $members) {
            array_push($this->name, $members->group_members_name);
            array_push($this->ic, $members->group_members_ic);
            $this->i =  $this->i + 1;
            array_push($this->inputs, $this->i);
        }
        $lastnumber = $this->i - 1;
        unset($this->inputs[$lastnumber]);
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

        return view('livewire.update-competition', [
            'schools' => School::all(),
            'groups' => Group::all(),
            'statuses' => Status::all(),
            'group_members' => Status::all()
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->ic = '';
    }

    public function resetField()
    {
        $this->ids = "";
        $this->edit_groups_invention_name = "";
        $this->edit_groups_age_categories = "";
        $this->edit_selectedSchool = "";
    }

    public function update()
    {
        $group = Group::findOrFail($this->group_id);
        $this->validate([
            'edit_groups_invention_name' => 'required',
            'edit_groups_age_categories' => 'required',
            'edit_selectedSchool' => 'required',
        ], [
            'edit_groups_invention_name.required' => 'please fill in your invention name as group name',
            'edit_groups_age_categories.required' => 'please select your age categories',
            'edit_selectedSchool.required' => 'please select your school',
        ]);

        $group->groups_invention_name = $this->edit_groups_invention_name;
        $group->groups_age_categories = $this->edit_groups_age_categories;
        $group->school_id  = $this->edit_selectedSchool;
        $group->save();

        //GroupMember::whereIn('group_id', $this->group_id)->update(['group_members_name' => $this->name]);
        $group_members = GroupMember::where('group_id', $this->group_id)->first();
        $id = $group_members->id;
        foreach ($this->name as $key => $value) {
            GroupMember::where('id', $id)->update(['group_members_name'=>$value]);
            GroupMember::where('id', $id)->update(['group_members_ic'=>$this->ic[$key]]);
            $group_members->save();
            $id = $id + 1;
        }

        $this->flashMessage = true;
        session()->flash('message', 'Registration form has successfully updated.');
    }
}
