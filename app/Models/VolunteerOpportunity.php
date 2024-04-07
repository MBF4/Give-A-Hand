<?php

// app/Models/VolunteerOpportunity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_name',
        'description',
        'location',
        'start_date',
        'end_date',
        'volunteer_hours',
        'specialization',
        'status',
        'image', // Add the 'image' column to the fillable array

    
    ];
    

    protected $casts = [
        'status' => 'boolean',
    ];
    

    protected $dates = ['start_date', 'end_date']; // This tells Laravel to treat these fields as dates

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // app/Models/VolunteerOpportunity.php

public function applications()
{
    return $this->hasMany(Application::class);
}

public function reviews()
{
    return $this->hasMany(Review::class, 'opportunity_id');
}

public function users()
{
    return $this->belongsToMany(User::class, 'applications');
}

}
