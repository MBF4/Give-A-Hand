<x-app-layout>
    <x-slot name="header">
    <title>Confirm Attendance</title>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Confirm Attendance')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($approvedApplications->isEmpty())
                        <p class="text-gray-500">@lang('No approved applications available for attendance confirmation.')</p>
                    @else
                        @foreach($approvedApplications->sortByDesc('updated_at') as $application)
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold">{{ $application->opportunity->event_name }}</h3>
                                <p class="text-gray-600">{{ $application->opportunity->description }}</p>
                                <p class="text-gray-500">@lang('Applicant'): {{ $application->user->name }}</p>
                                <p class="text-gray-500">@lang('Status'): @lang(ucfirst($application->status))</p>
                                
                                <form method="POST" action="{{ route('organizations.applications.process-attendance-confirmation', $application->id) }}">
                                    @csrf

                                    @if ($application->attendance_status !== 'attended')
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mr-2">@lang('Confirm Attendance')</button>
                                    @else
                                        <span class="text-green-500">@lang('Attendance Confirmed')</span>
                                    @endif
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
