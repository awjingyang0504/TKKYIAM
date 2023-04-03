<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    //PK
    public function participant() 
    {
        return $this->hasOne(Participant::class,'group_id');
    }
    public function group_members()
    {
        return $this->hasMany(GroupMember::class,'group_id');
    }  
    //FK
    public function school()
    {
        return $this->belongsTo('App\Models\School','school_id','id');
    }
}
