<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount_from1tofrom3',
        'amount_from4tofrom6',
    ];

    public function participant() {
        return $this->hasMany(Video::class,'status_id');
    }
}
