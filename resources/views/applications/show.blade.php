<!-- organizations/applications/show.blade.php -->
<title>Volunteer Opportunities</title>

@foreach($applications as $application)
    <div>
        <!-- Display application details here -->
        <p>@lang('User'): {{ $application->user->name }}</p>
        <p>@lang('Opportunity'): {{ $application->opportunity->event_name }}</p>
        <p>@lang('Status'): {{ ucfirst($application->status) }}</p>

        <!-- Accept and Reject buttons -->
        <form action="{{ route('organizations.applications.accept', $application) }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mr-2">@lang('Accept')</button>
        </form>

        <form action="{{ route('organizations.applications.reject', $application) }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">@lang('Reject')</button>
        </form>
    </div>
    <hr class="my-4">
@empty
    <p>@lang('No applications available for your organization.')</p>
@endforelse
