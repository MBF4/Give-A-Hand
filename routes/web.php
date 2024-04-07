<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerOpportunityController;

use App\Models\VolunteerOpportunity; // Make sure to use the correct model here


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['Localization'])->get('/', function () {
    $opportunities = VolunteerOpportunity::all(); // Use the correct model name
    return view('welcome', compact('opportunities'));
});

Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    App::setLocale($locale);
    session()->put('locale', $locale);
    if(Auth::check()){
    //  \App\User::where('id', Auth::user()->id)->update(['lang'=>$locale]);
    }
    return back();
});


Route::middleware(['Localization'])->get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','Localization')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




// ...
Route::middleware(['auth', 'Localization', 'organization_type'])->group(function () {
    // Create Volunteer Opportunity Form
    Route::get('opportunities/create', [VolunteerOpportunityController::class, 'create'])
        ->name('opportunities.create');
    // Store Volunteer Opportunity
    Route::post('opportunities', [VolunteerOpportunityController::class, 'store'])
        ->name('opportunities.store');
    // Index of Volunteer Opportunities
    Route::get('opportunities', [VolunteerOpportunityController::class, 'index'])
        ->name('opportunities.index');
    // Edit Volunteer Opportunity Form
    Route::get('opportunities/{id}/edit', [VolunteerOpportunityController::class, 'edit'])
        ->name('opportunities.edit');
    // Update Volunteer Opportunity
    Route::put('opportunities/{id}', [VolunteerOpportunityController::class, 'update'])
    ->name('opportunities.update');
    // Add the following line to define the resource routes
    Route::resource('opportunities', VolunteerOpportunityController::class)->except(['create', 'store', 'edit', 'update', 'show']);

    
});

Route::get('session', function(){
    $session = session()->all();
    dd($session);
});


// routes/web.php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\OrganizationApplicationController;

use App\Http\Controllers\UserApplicationController;


use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PrintController;


Route::middleware(['auth','Localization' ,'usertype'])->group(function () {
    Route::get('/user/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::post('/user/applications/{opportunity}', [ApplicationController::class, 'apply'])->name('applications.apply');
    Route::get('/attended-opportunities', [ApplicationController::class, 'attendedOpportunities'])
    ->middleware(['auth'])
    ->name('attended-opportunities.index');

    //add review form submission routes
    Route::get('/opportunities/{opportunity}/add-review', [ReviewController::class, 'create'])
    ->middleware(['auth'])
    ->name('opportunities.add-review');

    Route::post('/opportunities/{opportunity}/add-review', [ReviewController::class, 'store'])
    ->middleware(['auth'])
    ->name('opportunities.store-review');


    Route::get('/applications/{opportunity}/reviews', [ApplicationController::class, 'showReviews'])
    ->middleware(['auth'])
    ->name('applications.reviews');
    
    Route::get('/opportunities/{opportunity}/add-review', [ReviewController::class, 'create'])
        ->middleware(['auth'])
        ->name('opportunities.add-review');

    Route::post('/opportunities/{opportunity}/add-review', [ReviewController::class, 'store'])
        ->middleware(['auth'])
        ->name('opportunities.store-review');

//like and dislike routes
    Route::post('/reviews/{review}/like', [ReviewController::class, 'like'])->name('reviews.like');
    Route::post('/reviews/{review}/dislike', [ReviewController::class, 'dislike'])->name('reviews.dislike');
    
    Route::get('/opportunities/{id}/details', [VolunteerOpportunityController::class, 'details'])->name('opportunities.details');
    Route::get('/print-certification/{userId}', [PrintController::class, 'printCertification'])->name('print.certification');

    Route::get('/applications/{opportunity}/reviews', [ApplicationController::class, 'showReviews'])
    ->middleware(['auth', 'Localization'])
    ->name('applications.reviews');
});





Route::middleware(['auth', 'Localization', 'organization_type'])->group(function () {
    Route::prefix('organizations')->group(function () {
        Route::get('applications', [OrganizationApplicationController::class, 'index'])
            ->name('organizations.applications.index');
        Route::put('applications/{application}/accept', [OrganizationApplicationController::class, 'accept'])
            ->name('organizations.applications.accept');
        Route::put('applications/{application}/reject', [OrganizationApplicationController::class, 'reject'])
            ->name('organizations.applications.reject');
        // Add route for confirming attendance
        Route::get('applications/confirm-attendance', [OrganizationApplicationController::class, 'confirmAttendance'])
           ->name('organizations.applications.confirm-attendance');
        // Process attendance confirmation
        Route::post('applications/{application}/confirm-attendance', [OrganizationApplicationController::class, 'processAttendanceConfirmation'])
            ->name('organizations.applications.process-attendance-confirmation');

        Route::get('/organization/reviews', [OrganizationApplicationController::class, 'reviews'])
            ->middleware(['auth'])
            ->name('organization.reviews.index');


        Route::put('/opportunities/{id}/close', [VolunteerOpportunityController::class, 'close'])
            ->name('opportunities.close');

        Route::put('/opportunities/{id}/open', [VolunteerOpportunityController::class, 'open'])
            ->name('opportunities.open');
    });
});




// use App\Http\Controllers\ReviewController;

//     Route::get('/opportunities/{opportunity}/add-review', [ReviewController::class, 'create'])
//         ->middleware(['auth'])
//         ->name('opportunities.add-review');

//     Route::post('/opportunities/{opportunity}/add-review', [ReviewController::class, 'store'])
//         ->middleware(['auth'])
//         ->name('opportunities.store-review');


//     Route::post('/reviews/{review}/like', [ReviewController::class, 'like'])->name('reviews.like');
//     Route::post('/reviews/{review}/dislike', [ReviewController::class, 'dislike'])->name('reviews.dislike');
    

    // Your existing routes...
    
    // Route::get('/applications/{opportunity}/reviews', [ApplicationController::class, 'showReviews'])
    //     ->middleware(['auth', 'Localization'])
    //     ->name('applications.reviews');


    //     Route::put('/opportunities/{id}/close', [VolunteerOpportunityController::class, 'close'])
    //     ->name('opportunities.close');

    //     Route::put('/opportunities/{id}/open', [VolunteerOpportunityController::class, 'open'])
    //     ->name('opportunities.open');



        // routes/web.php

// use App\Http\Controllers\PrintController;

// Route::get('/print-certification/{userId}', [PrintController::class, 'printCertification'])->name('print.certification');

// Route::get('/opportunities/{id}/details', [VolunteerOpportunityController::class, 'details'])->name('opportunities.details');

require __DIR__.'/auth.php';