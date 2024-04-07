<!-- resources/views/volunteer_opportunities/index.blade.php -->

<x-app-layout>
<title>Volunteer Opportunities</title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Volunteer Opportunities')
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

                    @if ($opportunities->isEmpty())
                    <div>
                        <p class="text-gray-500 mb-4">@lang("You haven't created any volunteer opportunities yet.")</p>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('opportunities.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">@lang('Create a New Opportunity')</a>
                    </div>
                    @else
                        <!-- Add Create Opportunity Button -->
                        <div class="mb-4">
                            <a href="{{ route('opportunities.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">@lang('Create a New Opportunity')</a>
                        </div>

                        @foreach($opportunities as $opportunity)
                            <div class="mb-4">
                            @if ($opportunity->image)
                            <img src="{{ asset('storage/' . $opportunity->image) }}" alt="Opportunity Image" class="max-w-full mb-2 mr-4" style="float: right; width:250px; height: 250px;">
                         @endif                            

                                <h3 class="text-lg font-semibold">{{ $opportunity->event_name }}</h3>
                                <p class="text-gray-600">@lang('Description'): {{ $opportunity->description }}</p>
                                <p class="text-gray-500">@lang('Location'): {{ $opportunity->location }}</p>
                                <p class="text-gray-500">@lang('Specialization'): @lang($opportunity->specialization)</p>
                                <p class="text-gray-500">@lang('Start Date'): {{ \Carbon\Carbon::parse($opportunity->start_date)->format('Y-m-d H:i') }}</p>
                                <p class="text-gray-500">@lang('End Date'): {{ \Carbon\Carbon::parse($opportunity->end_date)->format('Y-m-d H:i') }}</p>
                                <p class="text-gray-500">@lang('Volunteer Hours'): {{ $opportunity->volunteer_hours }}</p>
                                @if ($opportunity->status)
                                <p class="text-gray-500">@lang('Application Status'): <span class="text-green-500">@lang('Open')</span></p>
                                    @else
                                    <p class="text-gray-500">@lang('Application Status'): <span class="text-red-500">@lang('Closed')</span></p>
                                    @endif

                                    
                                <!-- <p class="text-gray-500">@lang('Created by'): {{ $opportunity->user->name }}</p> -->
                                
                                <!-- Buttons -->
                                <div class="mt-2 flex">
                                    <a href="{{ route('opportunities.edit', $opportunity->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">@lang('Update')</a>
                                    
                                                        <!-- Close Event Button -->
                                   @if($opportunity->status)
                                    {{-- Display the "Close Event" button --}}
                                    <form action="{{ route('opportunities.close', $opportunity->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">@lang('Deactivate Event Application')</button>
                                    </form>
                                @else
                                    {{-- Display the "Open Event Application" button --}}
                                    <form action="{{ route('opportunities.open', $opportunity->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">@lang('Activate Event Application')</button>
                                    </form>
                                @endif

                                    
                                    
                                   <!-- Delete Button -->
                            <form action="{{ route('opportunities.destroy', $opportunity->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">@lang('Delete')</button>
                            </form>
                            

                                </div>
                            </div>
                            <hr class="my-4">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
