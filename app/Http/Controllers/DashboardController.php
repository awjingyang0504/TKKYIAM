<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role_id;

        if ($role == '1') {
            return view('livewire.manage-dashboard');
        } else {
            return view('livewire.dashboard');
        }
    }
}
