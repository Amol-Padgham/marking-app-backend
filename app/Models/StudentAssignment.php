<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentAssignment extends Model
{
    use HasFactory;
    protected $primaryKey = 'StudentAssignmentID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'StudentAssignmentID', 'StudentID', 'AssignmentID', 'SubmissionDate', 'Status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID');
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'AssignmentID');
    }
}
