<?php

namespace App\Http\Controllers;

use App\Models\VolunteerOpportunity;
use Illuminate\View\View;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VolunteerOpportunityController extends Controller
{
    public function create(): View
    {
        return view('volunteer_opportunities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'volunteer_hours' => 'required|integer|min:1', 
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('opportunity_images', 'public');
        } else {
            $imagePath = null;
        }

        $opportunity = VolunteerOpportunity::create([
            'user_id' => auth()->id(),
            'event_name' => $request->event_name,
            'description' => $request->description,
            'location' => $request->location,
            'start_date' => \Carbon\Carbon::parse($request->start_date),
            'end_date' => \Carbon\Carbon::parse($request->end_date),
            'volunteer_hours' => $request->volunteer_hours,
            'specialization' => $request->specialization,
            'image' => $imagePath, 


        ]);
    
        return redirect()->route('opportunities.index')
            ->with('success', 'Volunteer opportunity created successfully!');
    }

    public function edit($id)
    {
        $opportunity = VolunteerOpportunity::findOrFail($id);
    
        // Check if the authenticated user is the owner of the opportunity
        if (auth()->user()->id !== $opportunity->user_id) {
            abort(403, 'Unauthorized action.'); // You can customize the error message and HTTP status code
        }
    
        // Convert date fields to DateTime objects
        $opportunity->start_date = \Carbon\Carbon::parse($opportunity->start_date);
        $opportunity->end_date = \Carbon\Carbon::parse($opportunity->end_date);
    
        return view('volunteer_opportunities.edit', compact('opportunity'));
    }
    
    
    // VolunteerOpportunityController.php

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'volunteer_hours' => 'required|integer|min:1|max:50',
            'specialization' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add image validation rule
        ]);
    
        $opportunity = VolunteerOpportunity::findOrFail($id);
    
        // Update opportunity fields
        $opportunity->update([
            'event_name' => $request->event_name,
            'description' => $request->description,
            'location' => $request->location,
            'start_date' => \Carbon\Carbon::parse($request->start_date),
            'end_date' => \Carbon\Carbon::parse($request->end_date),
            'volunteer_hours' => $request->volunteer_hours,
            'specialization' => $request->specialization,
            'status' => $request->status, // Update status based on the form input
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add image validation rule

        ]);
    
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($opportunity->image) {
                Storage::delete('public/opportunity_images/' . $opportunity->image);
            }
    
            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
    
            // Store the new image
            $imagePath = $request->file('image')->storeAs('public/opportunity_images', $imageName);
    
            // Update the opportunity with the new image path
            $opportunity->update(['image' => 'opportunity_images/' . $imageName]);
        }
    
        return redirect()->route('opportunities.index')
            ->with('success', 'Volunteer opportunity updated successfully!');
    }
    

    



    public function destroy($id)
    {
        $opportunity = VolunteerOpportunity::findOrFail($id);

        // Check if the authenticated user is the owner of the opportunity
        if (Auth::id() != $opportunity->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $opportunity->delete();

        return redirect()->route('opportunities.index')
            ->with('success', 'Volunteer opportunity deleted successfully!');
    }


    public function index(): View
    {
        $opportunities = VolunteerOpportunity::where('user_id', Auth::id())->get();

        return view('volunteer_opportunities.index', compact('opportunities'));
    }


    public function close($id)
    {
        $opportunity = VolunteerOpportunity::findOrFail($id);

        if (auth()->user()->id !== $opportunity->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $opportunity->update(['status' => false]);

        return redirect()->route('opportunities.index')
            ->with('success', 'Volunteer opportunity closed successfully!');
    }

    public function open($id)
    {
        $opportunity = VolunteerOpportunity::findOrFail($id);

        if (auth()->user()->id !== $opportunity->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $opportunity->update(['status' => true]);

        return redirect()->route('opportunities.index')
            ->with('success', 'Volunteer opportunity opened successfully!');
    }


    public function details($id)
{
    $opportunity = VolunteerOpportunity::findOrFail($id);
    return view('volunteer_opportunities.details', compact('opportunity'));
}
    


}