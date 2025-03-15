<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff'; // Explicitly defining the table name
    protected $primaryKey = 'StaffID'; // Ensure StaffID is the primary key
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true; // Ensure timestamps are enabled

    protected $fillable = [
        'name',  // Updated to match the seeder (case-sensitive)
        'email', // Updated to match the seeder (case-sensitive)
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'CreatedBy', 'StaffID');
    }
}

