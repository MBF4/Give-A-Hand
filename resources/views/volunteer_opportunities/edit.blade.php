<!-- resources/views/volunteer_opportunities/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4">Edit Volunteer Opportunity</h2>

        <form action="{{ route('volunteer_opportunities.update', $opportunity->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Add your form fields here with Bootstrap styling -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Opportunity</button>
            </div>
        </form>
    </div>
@endsection
