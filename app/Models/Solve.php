<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Solve extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
