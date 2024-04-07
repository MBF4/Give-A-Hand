<x-app-layout>
<title>Applications</title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Organization Applications')
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

                    @if ($applications->isEmpty())
                        <p class="text-gray-500">@lang('No applications available for your volunteer opportunities.')</p>
                    @else
                        {{-- Display Pending Applications --}}
                        @foreach($applications->where('status', 'pending') as $application)
                            <div class="mb-4">
                                <!-- Display Application Details -->
                                <p>@lang('Applicant'): {{ $application->user->name }}</p>
                                <p>@lang('Specialization'): {{ $application->user->specialization }}</p>
                                <p>@lang('Volunteer Hours'): {{ $application->user->volunteer_hours }}</p>
                                <p>@lang('Status'): <span class="text-blue-500">@lang('Pending')</span></p>

                                <!-- Display Accept/Reject buttons for Pending Applications -->
                                <div class="mt-2 flex">
                                    <form action="{{ route('organizations.applications.accept', $application->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">@lang('Accept')</button>
                                    </form>

                                    <form action="{{ route('organizations.applications.reject', $application->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">@lang('Reject')</button>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-4">
                        @endforeach

                        {{-- Display Approved and Rejected Applications --}}
                        @foreach($applications->whereIn('status', ['approved', 'rejected'])->sortByDesc('updated_at') as $application)
                            <div class="mb-4">
                                <!-- Display Application Details -->
                                <p>@lang('Applicant'): {{ $application->user->name }}</p>
                                <p>@lang('Specialization'): {{ $application->user->specialization }}</p>
                                <p>@lang('Volunteer Hours'): {{ $application->user->volunteer_hours }}</p>
                                <p>@lang('Status'): 
                                    @if($application->status == 'approved')
                                        <span class="text-green-500">@lang('Approved')</span>
                                    @elseif($application->status == 'rejected')
                                        <span class="text-red-500">@lang('Rejected')</span>
                                    @endif
                                </p>
                            </div>
                            <hr class="my-4">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
