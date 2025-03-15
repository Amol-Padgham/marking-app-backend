<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'StudentID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'StudentNumber', 'FirstName', 'LastName', 'Email'
    ];

    public function assignments()
    {
        return $this->hasMany(StudentAssignment::class, 'StudentID');
    }
}
