<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'content',
        'workout_id',
    ];

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }
}
