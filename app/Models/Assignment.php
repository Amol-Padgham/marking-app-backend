<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'AssignmentID';
    public $incrementing = true; // Enable auto-increment
    protected $keyType = 'int'; // Change key type to integer

    protected $fillable = [
        'Title', 'Description', 'TotalPoints', 'DueDate', 'CreatedBy'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'CreatedBy', 'StaffID'); // Explicit foreign key reference
    }

    public function students()
    {
        return $this->hasMany(StudentAssignment::class, 'AssignmentID');
    }
}
