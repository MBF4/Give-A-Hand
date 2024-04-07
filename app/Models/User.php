<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'birthdate',
        'education_level',
        'specialization',
        'volunteer_hours',
        'type',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // app/Models/User.php

public function applications()
{
    return $this->hasMany(Application::class);
}
// User model

public function volunteer_opportunities()
{
    return $this->hasMany(VolunteerOpportunity::class);
}

// User.php

// User.php

public function attendedOpportunities()
{
    return $this->belongsToMany(VolunteerOpportunity::class, 'applications', 'user_id', 'opportunity_id')
        ->withTimestamps(); // Assuming your pivot table has timestamps
}


public function volunteerOpportunities()
    {
        return $this->belongsToMany(VolunteerOpportunity::class, 'applications');
    }

    
}
