<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'group_id',
        'status_id', 
        'participant_name', 
        'participant_gender'
    ];

    //PK
    public function video() {
        return $this->hasOne(Video::class,'participant_id');
    }

    //FK
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function group()
    {
        return $this->belongsTo('App\Models\Group','group_id','id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Status','status_id','id');
    }
    
}
