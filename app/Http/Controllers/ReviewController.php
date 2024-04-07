<?php

// app/Http/Controllers/ReviewController.php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\VolunteerOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(VolunteerOpportunity $opportunity)
{
    $attended = auth()->user()->applications()
        ->where('opportunity_id', $opportunity->id)
        ->where('attendance_status', 'attended')
        ->exists();

    if (!$attended) {
        abort(403, 'Unauthorized action. You must attend the opportunity to add a review.');
    }

    return view('reviews.create', compact('opportunity'));  
}

    public function store(Request $request, VolunteerOpportunity $opportunity)
    {
    $attended = auth()->user()->applications()
        ->where('opportunity_id', $opportunity->id)
        ->where('attendance_status', 'attended')
        ->exists();

    if (!$attended) {
        abort(403, 'Unauthorized action. You must attend the opportunity to add a review.');
    }

    $request->validate([
        'content' => 'required|string',
        'rating' => 'required|integer|between:1,5', 
    ]);

    $review = new Review([
        'user_id' => Auth::id(),
        'opportunity_id' => $opportunity->id,
        'content' => $request->content,
        'rating' => $request->rating,
        'likes' => 0,
        'dislikes' => 0,
    ]);

    $review->save();

    return redirect()->route('attended-opportunities.index')
        ->with('success', 'Review added successfully!');
    }


public function like(Review $review)
{
    $review->increment('likes');
    return redirect()->back();
}

public function dislike(Review $review)
{
    $review->increment('dislikes');
    return redirect()->back();
}


}
