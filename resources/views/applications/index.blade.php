<x-app-layout>
    <x-slot name="header">
    <title>Volunteer Opportunities</title>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Volunteer Opportunities')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-4">
                        <form action="{{ route('applications.index') }}" method="GET" class="flex space-x-4" id="filterForm">
                            <!-- Location filter -->
                            <div class="flex items-center">
                                <label for="location" class="text-sm font-medium text-gray-700">@lang('Location'):</label>
                                <input type="text" id="location" name="location" class="ml-2 p-2 border border-gray-300 rounded" value="{{ request('location') }}" />
                            </div>

                            <!-- Specialization filter -->
                            <div class="flex items-center">
                                <label for="specialization" class="text-sm font-medium text-gray-700">@lang('Specialization'):</label>
                                <select id="specialization" name="specialization" class="ml-2 p-2 border border-gray-300 rounded">
                                    <option value="" disabled selected>@lang('Select Specialization')</option>
                                    <option value="medicine" {{ old('specialization') == 'medicine' ? 'selected' : '' }}>@lang('Medicine')</option>
                                    <option value="engineering" {{ old('specialization') == 'engineering' ? 'selected' : '' }}>@lang('Engineering')</option>
                                    <option value="computer science" {{ old('specialization') == 'computer science' ? 'selected' : '' }}>@lang('Computer Science')</option>
                                    <option value="accounting" {{ old('specialization') == 'accounting' ? 'selected' : '' }}>@lang('Accounting')</option>
                                    <option value="business administration" {{ old('specialization') == 'business administration' ? 'selected' : '' }}>@lang('Business Administration')</option>
                                    <option value="finance" {{ old('specialization') == 'finance' ? 'selected' : '' }}>@lang('Finance')</option>
                                    <option value="marketing" {{ old('specialization') == 'marketing' ? 'selected' : '' }}>@lang('Marketing')</option>
                                    <option value="human resources" {{ old('specialization') == 'human resources' ? 'selected' : '' }}>@lang('Human Resources')</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <!-- Start Date filter -->
                            <div class="flex items-center">
                                <label for="start_date" class="text-sm font-medium text-gray-700">@lang('Start Date'):</label>
                                <input type="date" id="start_date" name="start_date" class="ml-2 p-2 border border-gray-300 rounded" value="{{ request('start_date') }}" />
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Filter')</button>
                            <button onclick="resetLocationAndRedirect()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">@lang('Reset')</button>

                            <script>
                                function resetLocationAndRedirect() {
                                    // Reset the location input
                                    document.getElementById('location').value = '';
                                    document.getElementById('start_date').value = '';

                                    // Redirect to the specified URL
                                    window.location.href = '{{ route('applications.index') }}';
                                }
                            </script>

                        </form>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if ($opportunities->isEmpty())
                        <p class="text-gray-500">@lang('No matching volunteer opportunities found.')</p>
                    @else
                        {{-- Recommended Opportunities --}}
                        @foreach($opportunities->where('status', 1)->where('specialization', auth()->user()->specialization) as $opportunity)
                            <div class="mb-4">
                            @if ($opportunity->image)
                            <img src="{{ asset('storage/' . $opportunity->image) }}" alt="Opportunity Image" class="max-w-full mb-2 mr-4" style="float: right; max-width: 150px; height: 100%;">
                           @endif  

                           <h3 class="text-lg font-semibold">{{ $opportunity->event_name }}</h3>
                                <!-- <p class="text-gray-600">@lang('Description'): {{ $opportunity->description }}</p> -->
                                <p class="text-gray-500">@lang('Location'): {{ $opportunity->location }}</p>
                                <!-- <p class="text-gray-500">@lang('Specialization'): {{ $opportunity->specialization }}</p> -->
                                <p class="text-gray-500">@lang('Start Date'): {{ \Carbon\Carbon::parse($opportunity->start_date)->format('Y-m-d H:i') }}</p>
                                <!-- <p class="text-gray-500">@lang('End Date'): {{ \Carbon\Carbon::parse($opportunity->end_date)->format('Y-m-d H:i') }}</p> -->
                                <p class="text-gray-500">@lang('Created by'): {{ $opportunity->user->name }}</p>
                                <a href="{{ route('applications.reviews', $opportunity->id) }}" class="text-blue-500 underline hover:text-blue-700">@lang('Read Reviews')</a>

                                @php
                                    $applied = auth()->user()->applications->contains('opportunity_id', $opportunity->id);
                                @endphp

                                @if ($applied)
                                    <p class="text-green-500">@lang('You have already applied to this opportunity.')</p>
                                @else

                                    <!-- <form action="{{ route('applications.apply', $opportunity->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mr-2">@lang('Apply Now')</button>
                                    </form> -->

                                    <form action="{{ route('opportunities.details', $opportunity->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('More')</button>
                                </form>


                                @endif
                            </div>
                            <hr class="my-4">
                        @endforeach

                        {{-- Other Opportunities --}}
                        @foreach($opportunities->where('status', 1)->where('specialization', '!=', auth()->user()->specialization) as $opportunity)
                            <div class="mb-4">
                            @if ($opportunity->image)
                            <img src="{{ asset('storage/' . $opportunity->image) }}" alt="Opportunity Image" class="max-w-full mb-2 mr-4" style="float: right; width: 300px; height: auto;">
                           @endif  
                                <h3 class="text-lg font-semibold">{{ $opportunity->event_name }}</h3>
                                <!-- <p class="text-gray-600">@lang('Description'): {{ $opportunity->description }}</p> -->
                                <p class="text-gray-500">@lang('Location'): {{ $opportunity->location }}</p>
                                <!-- <p class="text-gray-500">@lang('Specialization'): {{ $opportunity->specialization }}</p> -->
                                <p class="text-gray-500">@lang('Start Date'): {{ \Carbon\Carbon::parse($opportunity->start_date)->format('Y-m-d H:i') }}</p>
                                <!-- <p class="text-gray-500">@lang('End Date'): {{ \Carbon\Carbon::parse($opportunity->end_date)->format('Y-m-d H:i') }}</p> -->
                                <p class="text-gray-500">@lang('Created by'): {{ $opportunity->user->name }}</p>
                                <a href="{{ route('applications.reviews', $opportunity->id) }}" class="text-blue-500 underline hover:text-blue-700">@lang('Read Reviews')</a>

                              
                               

                                <!-- Check if the user has already applied -->
                                @php
                                    $applied = auth()->user()->applications->contains('opportunity_id', $opportunity->id);
                                @endphp

                                @if ($applied)

                                    <p class="text-green-500">@lang('You have already applied to this opportunity.')</p>
                                @else

                                <form action="{{ route('opportunities.details', $opportunity->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('More')</button>
                                </form>
                                @endif
                            </div>
                            <hr class="my-4">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
