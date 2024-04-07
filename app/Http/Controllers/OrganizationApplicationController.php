<?php

// app/Http/Controllers/OrganizationApplicationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Review;

use Illuminate\Support\Facades\DB;


class OrganizationApplicationController extends Controller
{
    public function index()
    {
        // Fetch applications related to the organization's volunteer opportunities
        $applications = Application::whereHas('opportunity', function ($query) {
            $query->where('user_id', auth()->id()); // Assuming the organization's user_id is stored in the volunteer_opportunities table
        })->get();

        return view('organizations.applications.index', compact('applications'));
    }

    public function accept(Application $application)
    {
        if (auth()->id() !== $application->opportunity->user_id) {
            abort(403, 'Unauthorized');
        }

        $application->update(['status' => 'approved']);

        return redirect()->route('organizations.applications.index')->with('success', 'Application accepted successfully!');
    }

    public function reject(Application $application)
    {
        if (auth()->id() !== $application->opportunity->user_id) {
            abort(403, 'Unauthorized');
        }

        $application->update(['status' => 'rejected']);

        return redirect()->route('organizations.applications.index')->with('success', 'Application rejected successfully!');
    }

    public function confirmAttendance()
    {
        $approvedApplications = Application::whereHas('opportunity', function ($query) {
            $query->where('user_id', auth()->id()); 
        })->where('status', 'approved')->get();

        return view('organizations.applications.confirm-attendance', compact('approvedApplications'));
    }

    public function processAttendanceConfirmation(Request $request, Application $application)
{

    if (auth()->id() !== optional($application->opportunity)->user_id) {
        abort(403, 'Unauthorized');
    }

    if ($application->attendance_status === 'attended') {
        return redirect()->route('organizations.applications.confirm-attendance')->with('error', 'Attendance already confirmed.');
    }

    $application->update(['attendance_status' => 'attended']);

    $user = $application->user;
    $volunteerOpportunity = $application->opportunity;

    if (!$user) {
        return redirect()->route('organizations.applications.confirm-attendance')->with('error', 'User not found.');
    }
    DB::table('users')->where('id', $user->id)->increment('volunteer_hours', (int)$volunteerOpportunity->volunteer_hours);

    return redirect()->route('organizations.applications.confirm-attendance')->with('success', 'Attendance confirmed successfully!');
}

    
    



// app/Http/Controllers/OrganizationApplicationController.php

public function reviews()
{


    $reviews = Review::whereIn('opportunity_id', function ($query) {
        $query->select('id')->from('volunteer_opportunities')->where('user_id', auth()->id());
    })->with('opportunity')->get();
    return view('organizations.applications.reviews', compact('reviews'));
}



}
