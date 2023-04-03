<?php

namespace App\Http\Livewire;

use App\Models\Info;
use App\Models\Activity;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Response;

class ManageNotification extends Component
{
    public $selectData = true;
    public $createData = false;
    public $updateData = false;
    public $flashMessage = false; 

    public function flashM(){
        set_time_limit(3);
        ini_set('max_execution_time', 3); 
    }

    public $title;
    public $note;
    public $date;
    public $ids;
    public $edit_title;
    public $edit_note;
    public $edit_date;

    public $total_information;
    public $search;

    public $participant_name='All participant';
    public $update_title = null;
    public $selectedstatus = null;
    public $info_id;

    use WithPagination;
    public function render()
    {
        if (Gate::denies('ManageandActivity')) {
            abort(403);
        }
        if ($this->search != "") {
            $searchTerm = '%' . $this->search . '%';
            $notification = Info::orderBy('id', 'DESC')->where('Title', 'LIKE', $searchTerm)->paginate(5);
        } else {
        $this->total_information = Info::get();
        $notification=Info::orderBy('id','DESC')->paginate(5);
        }
        return view('livewire.manage-notification',['infos'=>$notification]);
    }

    public function showFrom()
    {
        $this->createData = true;
        $this->selectData = false;
    }

    public function resetField()
    {
        $this->name = "";
        $this->email = "";
        $this->country = "";
        $this->ids= "";
        $this->edit_title= "";
        $this->edit_note= "";
        $this->edit_date= "";
    }

    
    public function create()
    {
        $notification = new Info();

        $this->validate([
            'title' => 'required',
            'note' => 'required',
            'date' => 'required'
        ]);
        $notification->title = $this->title;
        $notification->note = $this->note;
        $notification->date = $this->date;
        $result = $notification->save();
        
        $this->resetField();
        $this->selectData = true;
        $this->createData = false;
        $this->flashMessage = true;
        //if ($this->flashMessage == true)return $this->flashM();

        session()->flash('message', 'Notification successfully updated.');
        return $this->createactivity();
    }

    public function edit($id)
    {
        $this->selectData = false;
        $this->updateData = true;

        $notification = Info::findOrFail($id);
        $this->ids = $notification->id;
        $this->edit_title = $notification->title;
        $this->edit_note = $notification->note;
        $this->edit_date = $notification->date;

        return $this->edit_title;
    }

    public function update($id)
    {
        $notification = Info::findOrFail($id);
        $this->validate([
            'edit_title' => 'required',
            'edit_note' => 'required',
            'edit_date' => 'required'
        ]);

        $notification->title = $this->edit_title;
        $notification->note = $this->edit_note;
        $notification->date = $this->edit_date;
        $result = $notification->save();

        $this->resetField();
        $this->selectData = true;
        $this->updateData = false;
        $this->flashMessage = true;
        //if ($this->flashMessage == true)return $this->flashM();

        session()->flash('message', 'Notification successfully updated.');
        //return $this->edit_title;
        //return $this->updateactivity($id);
        return $this->updateactivity1();
    }

    public function delete($id)
    {
        $notification = Info::findOrFail($id);
        $result = $notification->delete();
        $this->flashMessage = true;
        //if ($this->flashMessage == true)return $this->flashM();

        session()->flash('message1', 'Notification successfully deleted.');
        
        return $this->deleteactivity();
    }

    public function createactivity()
    {
        //Create activity
        $activity = new Activity();
        $activity->admin_name = auth()->user()->name;
        $activity->user_name = $this->participant_name;
        $activity->activities_summary = 'create notification as title->' . $this->title;
        $activity->save();

        return redirect(request()->header('Referer'));
    }

    
    public function updateactivity1()
    {
        //$titlename = $this->edit_title;
        //$updateactivity = Info::find($info_id)->update([
        //    'title' => $titlename,
        //]);
        //$this->edit_title = $this->edit(); 

        $updateactivity = Info::find($this->edit_title);

        $activity = new Activity();
        $activity->admin_name = auth()->user()->name;
        $activity->user_name = $this->participant_name;
        $activity->activities_summary = 'update notification as ' . $updateactivity;
        $activity->save();

        //return redirect(request()->header('Referer'));

    }
    
    public function updateactivity()
    {
        // $activity = Activity::findOrFail($id);
        // $activity->admin_name = auth()->user()->name;
        // $activity->user_name = $this->participant_name;
        // $activity->activities_summary = 'update notification as ' . $this->edit_title;
        // $activity->save();
        
        //return redirect(request()->header('Referer'));
    }

    public function deleteactivity(){
        //$activity = Activity::findOrFail();
        //$result = $activity->delete();

        //$notification = Info::findOrFail($id);
        //$notification->title = $this->title;

        $activity = new Activity();
        $activity->admin_name = auth()->user()->name;
        $activity->user_name = $this->participant_name;
        $activity->activities_summary ='Notification deleted sucessfully' . $this->title;
        $activity->save();

        //return redirect(request()->header('Referer'));
    }

}
