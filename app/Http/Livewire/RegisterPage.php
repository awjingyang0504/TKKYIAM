<?php

namespace App\Http\Livewire;

use App\Models\Participant;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class RegisterPage extends Component
{
    public $redirect;
    public $user_id, $participant, $group_id;


    public function mount()
    {
        $this->user_id = auth()->user()->id;
        if (auth()->user()->role_id == 2) {
            $this->participant = Participant::where('user_id', $this->user_id)->first();
            $this->redirect = 'update';
        }
        else{
            $this->redirect = 'register';
        }
    }

    public function render()
    {
        if (Gate::denies('RegisterCompetition')) {
            abort(403);
        }
        return view('livewire.register-page');
    }
}
