<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory,Uuid;
    protected $fillable = [
        'uuid','contest_id'
    ];
    public function Participant()
    {
        return $this->morphTo();

    }
    public function contest()
    {
        return $this->belongsTo(Contest::class );
    }
   
}
