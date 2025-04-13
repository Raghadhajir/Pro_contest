<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Solve extends Model
{
    use HasFactory;
    protected $fillable = [
        'participant_id',
        'problem_id',
        'file',
        'status'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = str::uuid();
        });
    }
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
