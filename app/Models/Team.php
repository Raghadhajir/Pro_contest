<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Team extends Model
{
    use HasFactory,Uuid, SoftDeletes;
    protected $fillable=[
        'uuid','name','contest_id','user_id'
    ];

    public function users(){
        return $this->hasMany(User::class,'team_id');
    }
    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
