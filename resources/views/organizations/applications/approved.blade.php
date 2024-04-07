<!-- resources/views/organizations/applications/approved.blade.php -->

<x-app-layout>
<title>Applications</title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Approved Applications')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Display approved applications -->
                    @if ($approvedApplications->isEmpty())
                        <p class="text-gray-500">@lang('No approved applications available.')</p>
                    @else
                        @foreach($approvedApplications as $application)
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold">{{ $application->opportunity->event_name }}</h3>
                                <p class="text-gray-600">{{ $application->opportunity->description }}</p>
                                <p class="text-gray-500">@lang('Applicant'): {{ $application->user->name }}</p>
                                <p class="text-gray-500">@lang('Status'): {{ ucfirst($application->attendance_status) }}</p>

                                <!-- Confirm Attendance Form -->
                                <form action="{{ route('organizations.applications.update-attendance', ['application' => $application, 'status' => 'attended']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Confirm Attendance')</button>
                                </form>
                            </div>
                            <hr class="my-4">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
