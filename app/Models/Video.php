<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id', 'video_link','file','final_file',
    ];
    
    //FK
    public function participant(){
        return $this->belongsTo('App\Models\Participant','participant_id','id');
    }
}
