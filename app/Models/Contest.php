<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Contest extends Model
{
    use HasFactory;
    protected $fillable = [
       'name','date','register_availability'
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = str::uuid();
        });
    }
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    public function problems()
    {
        return $this->hasMany(Problem::class);
    }
}
