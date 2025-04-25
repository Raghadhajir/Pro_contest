<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory,Uuid;
    protected $fillable=[
        'uuid','name','contest_id','user_id'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
    public function coach()
    {
        return $this->belongsTo(User::class);
    }

}
