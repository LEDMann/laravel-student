<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'fee',
    ];
    
    /**
    * The users that belong to the course.
    */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'enrolment')->using(Enrolment::class);
    }

    /**
    * The enrolments that belong to the course.
    */
    public function enrolments(): hasMany
    {
        return $this->hasMany(Enrolment::class);
    }
}
