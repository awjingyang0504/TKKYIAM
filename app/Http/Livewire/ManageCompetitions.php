<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Webpage;
use Illuminate\Database\Eloquent\Model;

class ManageCompetitions extends Component
{
    public Model $model;

    public $flashMessage = false; 
    
    public string $field;
    public bool $isActive;
    

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function flashM(){
        set_time_limit(3);
        ini_set('max_execution_time', 3); 
    }

    public function updating($field, $value)
    {
        $update = $this->model->setAttribute($this->field, $value)->save();
        $status = 'close';
        if($value == 1){
            $status = 'open';
        }else{
            $status = 'close';
        }
        if($update){
            $this->flashMessage = true;
            session()->flash('message', $this->model->webpages_name.' has changed to '.$status);
        }
    }

    public function render()
    {
        return view('livewire.manage-competitions');
    }
}
