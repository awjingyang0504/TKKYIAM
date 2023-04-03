<?php

namespace App\Http\Livewire;

use App\Models\Info;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class Notification extends Component
{
    public $selectData = true;
    public $title;
    public $note;
    public $date;

    public $total_information;
    public $search;

    use WithPagination;
    public function render()
    {
        if ($this->search != "") {
            $searchTerm = '%' . $this->search . '%';
            $notification = Info::orderBy('id', 'DESC')->where('Title', 'LIKE', $searchTerm)->paginate(5);
        } else {
        $this->total_information = Info::get();
        $notification=Info::orderBy('id','DESC')->paginate(5);
        }
        return view('livewire.notification',['infos'=>$notification]);
    }
    
}


