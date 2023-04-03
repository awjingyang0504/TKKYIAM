<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Livewire\Component;

class DashboardController extends Component
{
    public function render()
    {
        $role = Auth::user()->role_id;

        if ($role == '1') {
            return redirect()->to('/manage-dashboard');
        }
        else{
            return redirect()->to('/dashboard');
        }
    }
    
}
