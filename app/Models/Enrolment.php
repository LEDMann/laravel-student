<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enrolment extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'active',
        'paid',
    ];

    /**
     * Get the course for the enrolment.
     */
    public function course(): Hasone
    {
        return $this->hasOne(Course::class);
    }

    /**
     * Get the user for the enrolment.
     */
    public function user(): hasOne
    {
        return $this->hasOne(User::class);
    }
}
