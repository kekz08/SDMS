<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scholarships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scholarship_name',
        'scholarship_description',
        'scholarship_type',
        'scholarship_amount',
        'scholarship_status',
        'application_deadline',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'scholarship_amount' => 'decimal:2',
        'application_deadline' => 'date',
    ];

    /**
     * Get the applications for the scholarship.
     */
    public function scholarApplications()
    {
        return $this->hasMany(ScholarApplication::class);
    }
}
