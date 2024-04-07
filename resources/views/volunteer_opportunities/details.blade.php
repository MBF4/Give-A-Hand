<!-- resources/views/volunteer_opportunities/show.blade.php -->
<x-app-layout>
<title>Volunteer Opportunities</title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $opportunity->event_name }}
        </h2>
    </x-slot>

    <div class="py-12">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Display detailed information about the opportunity here -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($opportunity->image)
                    <img src="{{ asset('storage/' . $opportunity->image) }}" alt="Opportunity Image" class="max-w-full mb-2 mr-4" style="float: right; max-width: 350px; height: auto;">
                @endif  
                <h3 class="text-lg font-semibold">{{ $opportunity->event_name }}</h3>
                <p class="text-gray-600">@lang('Description'): {{ $opportunity->description }}</p>
                <p class="text-gray-500">@lang('Location'): {{ $opportunity->location }}</p>
                <p class="text-gray-500">@lang('Specialization'): {{ $opportunity->specialization }}</p>
                <p class="text-gray-500">@lang('Start Date'): {{ \Carbon\Carbon::parse($opportunity->start_date)->format('Y-m-d H:i') }}</p>
                <p class="text-gray-500">@lang('End Date'): {{ \Carbon\Carbon::parse($opportunity->end_date)->format('Y-m-d H:i') }}</p>
                <p class="text-gray-500">@lang('Created by'): {{ $opportunity->user->name }}</p>
                <a href="{{ route('applications.reviews', $opportunity->id) }}" class="text-blue-500 underline hover:text-blue-700">@lang('Read Reviews')</a>

                <!-- Apply Now button -->
                <form action="{{ route('applications.apply', $opportunity->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mr-2">@lang('Apply Now')</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
