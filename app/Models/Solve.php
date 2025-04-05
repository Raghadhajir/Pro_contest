<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solve extends Model
{
    use HasFactory,Uuid;
    protected $fillable = [
        'uuid',
        'participant_id',
        'problem_id',
        'file',
        'status'
    ];
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
