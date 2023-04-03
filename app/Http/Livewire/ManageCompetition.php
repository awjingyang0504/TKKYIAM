<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use App\Models\Webpage;
use App\Models\Result;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;

class ManageCompetition extends Component
{
    public $isActive_UploadResult = false;

    public $flashMessage = false; 
    

    public Model $model;
    public $field;

    public $isActive;

    use WithFileUploads;

    public $file;
    public $title;

    public $rules = [
        'title' => '',
        'file' => '',
    ];

    public function mount(){
        $isActive_webpage = Webpage::where('webpages_name','Manage Result')->first();
        if($isActive_webpage->isActive == '1'){
            $this->isActive_UploadResult = true;
        }else{
            $this->isActive_UploadResult = false;
        }
    }

    public function flashM(){
        set_time_limit(3);
        ini_set('max_execution_time', 3); 
    }

    public function create()
    {
        $this->validate([
            'title' => 'required',
            'file' => 'required',
        ]);

        $file = $this->file;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $this->file->storeAs('file', $filename);
        $create = Result::create([
            'title' => $this->title,
            'file' => $filename,
        ]);
        if($create){
            $this->flashMessage = true;
            session()->flash('message', 'Result successfully uploaded');
        }
    }
    
    public function updating($field, $value)
    {
       // $this->model->setAttribute($this->field, $value)->save();
    }
   
    public function render()
    { 
        if (Gate::denies('ManageandActivity')) {
            abort(403);
        }

        return view('livewire.manage-competition', ['webpages' => Webpage::all()]);
    }
}
