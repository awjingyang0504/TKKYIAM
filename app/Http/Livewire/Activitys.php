<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use App\Models\Activity;
use Livewire\WithPagination;

class Activitys extends Component
{
    public $selectData = true;
    public $admin_name;
    public $user_name;
    public $activities_summary;

    public $total_activity;
    public $search;

    use WithPagination;
    public function render()
    {
        if ($this->search != "") {
            $searchTerm = '%' . $this->search . '%';
            $activity = Activity::orderBy('id', 'DESC')->where('user_name', 'LIKE', $searchTerm)->paginate(5);
        } else {
        $this->total_activity = Activity::get();
        $activity=Activity::orderBy('id','DESC')->paginate(5);
        }
        return view('livewire.activitys',['activities'=>$activity]);
    }
}
