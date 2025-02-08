<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarApplication extends Model
{
    use HasFactory;

    // Mass-assignable attributes
    protected $fillable = [
        'user_id',            // Added user_id for mass assignment
        'scholarship_id',     // Added scholarship_id for mass assignment
        'lastname',
        'firstname',
        'middlename',
        'sex',
        'birthdate',
        'track',
        'strand',
        'school',
        'talents',
        'address',
        'guardian',
        'guardian_name',
        'guardian_contact',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'appointment_date',
        'uploaded_files',
    ];

    // Type casting
    protected $casts = [
        'uploaded_files' => 'array',  // Ensuring uploaded_files is cast to an array
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming a 'User' model exists
    }

    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class); // Assuming a 'Scholarship' model exists
    }
}
