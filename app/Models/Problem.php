<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        'uuid',
        'title',
        'description',
        'file',
    ];
    public function solves()
    {
        return $this->hasMany(Solve::class);
    }
}
