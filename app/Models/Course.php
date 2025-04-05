<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, Uuid;
    protected $fillable = [
        'uuid',
        'name',
        'user_id',
        'course_date',
        'postponed_date'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
