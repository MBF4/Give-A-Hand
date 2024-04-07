<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VolunteerOpportunity;
use Illuminate\Http\Request;
use PDF; // Make sure you have the PDF library installed

namespace App\Http\Controllers;

use App\Models\User;
use PDF;

class PrintController extends Controller
{
    public function printCertification($userId)
    {
        $user = User::findOrFail($userId);
        $attendedOpportunities = $user->attendedOpportunities;
        $pdf = PDF::loadView('certification.print_attended_opportunities', compact('user', 'attendedOpportunities'));        
        return $pdf->download('attended_opportunities_certification.pdf');
    }
}