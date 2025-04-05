<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory,Uuid;
    protected $fillable = [
       'uuid','name','date','register_availability'
    ];
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    public function problems()
    {
        return $this->hasMany(Problem::class);
    }
}
