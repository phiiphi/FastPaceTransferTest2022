<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'course_code',
        'question_no',
        'question',
        'answer',
        'students_answer',
        'user_id',
        'students_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
