<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory,Uuid;
    protected $fillable=[
        'uuid','name'
    ];
    public function participants()
    {
        return $this->morphMany(Participant::class, 'participant');
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
