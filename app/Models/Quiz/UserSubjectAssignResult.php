<?php

namespace App\Models\Quiz;

use App\Models\User;
use App\Models\Quiz\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubjectAssignResult extends Model
{
    use HasFactory;

    protected $table = 'user_subject_assign_result';

    protected $fillable = [
        'user_id', 'subject_id', 'result'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
