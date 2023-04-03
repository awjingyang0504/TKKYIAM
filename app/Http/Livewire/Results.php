<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Result;
use Illuminate\Support\Facades\Response;

class Results extends Component
{

    public function export($id)
    {
        $file = Result::find($id);
        $path = storage_path() . '/' . 'app' . '/file/' . $file->file;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }

    public function render()
    {
        return view('livewire.results', [
            'results' => result::all()
        ]);
    }
}