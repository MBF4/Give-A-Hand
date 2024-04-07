<?php

// app/Models/Application.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'opportunity_id',
        'status', // Add any other fields you need
        'attendance_status',

    ];

  // Application.php

  public function user()
  {
      return $this->belongsTo(User::class);
  }
  
  public function opportunity()
  {
      return $this->belongsTo(VolunteerOpportunity::class, 'opportunity_id');
  }



public function volunteerOpportunity()
{
    return $this->belongsTo(VolunteerOpportunity::class, 'opportunity_id');
}



}

