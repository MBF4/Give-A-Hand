<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\VolunteerOpportunity;


use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = VolunteerOpportunity::query();
    
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }
    
        if ($request->filled('start_date')) {
            $query->whereDate('start_date', '>=', $request->input('start_date'));
        }

        if ($request->filled('specialization')) {
            $query->where('specialization', $request->input('specialization'));
        }
    
        $opportunities = $query->get();
    
        return view('applications.index', compact('opportunities'));
    }
    

    public function apply(Request $request, VolunteerOpportunity $opportunity)
    {

        $existingApplication = Application::where('user_id', auth()->id())
            ->where('opportunity_id', $opportunity->id)
            ->first();

        if ($existingApplication) {
            return redirect()->route('applications.index')->with('error', 'You have already applied to this opportunity.');
        }

        $application = new Application();
        $application->user_id = auth()->id();
        $application->opportunity_id = $opportunity->id;
        $application->attendance_status = 'pending';
        $application->save();

        return redirect()->route('applications.index')->with('success', 'Application submitted successfully!');
    }

    // New method to handle attendance status update
    public function updateAttendanceStatus(Application $application, $status)
    {
        // Check if the authenticated user is the opportunity owner
        if (auth()->id() !== $application->opportunity->user_id) {
            abort(403, 'Unauthorized');
        }

        // Validate if the provided status is valid
        if (!in_array($status, ['pending', 'attended', 'not_attended'])) {
            return redirect()->route('applications.index')->with('error', 'Invalid attendance status.');
        }

        // Update the attendance status
        $application->update(['attendance_status' => $status]);

        return redirect()->route('applications.index')->with('success', 'Attendance status updated successfully!');
    }


  public function attendedOpportunities()
{
    $attendedOpportunities = auth()->user()->applications()
        ->where('attendance_status', 'attended')
        ->with('opportunity.reviews') // Load the opportunity relationship and its reviews
        ->get();
    // dd($attendedOpportunities);
    return view('attended_opportunities.index', compact('attendedOpportunities'));
}
    

    

// Controller code (app/Http/Controllers/ApplicationController.php)
public function showReviews(VolunteerOpportunity $opportunity)
{
    $organizationReviews = Review::whereHas('opportunity', function ($query) use ($opportunity) {
            $query->where('user_id', $opportunity->user_id);
        })
        ->with('opportunity')
        ->get();
    return view('user_application.reviews', compact('organizationReviews', 'opportunity'));
}




}
