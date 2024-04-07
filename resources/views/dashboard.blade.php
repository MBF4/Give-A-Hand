<x-app-layout>
<title>Dashboard</title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Dashboard')
        </h2>
    </x-slot>
    <div class="py-12">
        @if(auth()->user()->type == 0)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Available Volunteer Opportunities')</h3>
                            <span class="text-2xl font-bold">{{ \App\Models\VolunteerOpportunity::count() }}</span>
                        </div>
                        <p class="text-gray-600">@lang('Explore the available volunteer opportunities.')</p>
                        <div class="mt-4">
                            <a href="{{ route('applications.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Explore Opportunities')</a>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Opportunities Needing a Review')</h3>
                            <span class="text-2xl font-bold">
                            {{
                                \App\Models\Application::where('user_id', auth()->id())
    ->where('status', 'approved')
    ->whereHas('volunteerOpportunity.reviews', function ($query) {
        $query->where('attendance_status', 'attended');
    })
    ->count()
    
    - 
    \App\Models\Review::where('user_id', auth()->id())->count()


    }}
                            </span>
                        </div>
                        <p class="text-gray-600">@lang('Volunteered opportunities awaiting review.')</p>
                        <div class="mt-4">
                            <a href="{{ route('attended-opportunities.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Reviews')</a>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Attended Opportunities')</h3>
                            <span class="text-2xl font-bold">{{ \App\Models\Application::where('user_id', auth()->id())->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Volunteer Hours')</h3>
                            <span class="text-2xl font-bold">{{ auth()->user()->volunteer_hours }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Reward Points')</h3>
                            <span class="text-2xl font-bold">{{ auth()->user()->volunteer_hours * 4}}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if(auth()->user()->type == 1)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Volunteer Opportunities')</h3>
                            <span class="text-2xl font-bold">{{ auth()->user()->volunteer_opportunities->count() }}</span>
                        </div>
                        <p class="text-gray-600">@lang('Explore the volunteer opportunities you have created.')</p>
                        <div class="mt-4">
                            <a href="{{ route('opportunities.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Volunteer Opportunity')</a>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <!-- <h3 class="text-lg font-semibold">@lang('Number of pending Applications')</h3>
                            <span class="text-2xl font-bold">{{ auth()->user()->whereHas('applications', function($query) {
                                $query->where('status', 'pending');
                            })->count() }}</span> -->

                            <h3 class="text-lg font-semibold">@lang('Number of pending Applications')</h3>
                            <span class="text-2xl font-bold">{{ \App\Models\Application::whereIn('opportunity_id', function($query) {
                                    $query->select('id')->from('volunteer_opportunities')->where('user_id', auth()->id());
                                })->where('status', 'pending')->count() }}</span>


                        </div>
                        <p class="text-gray-600">@lang('Explore the applications that are currently pending for approval.')</p>
                        <div class="mt-4">
                            <a href="{{ route('organizations.applications.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Applications')</a>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Number of Volunteers')</h3>
                            <span class="text-2xl font-bold">{{ \App\Models\Application::whereHas('volunteerOpportunity', function ($query) {
                                $query->where('user_id', auth()->id());
                            })->where('status', 'approved')->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">@lang('Total Volunteer Hours')</h3>
                            <span class="text-2xl font-bold">{{ \App\Models\VolunteerOpportunity::where('user_id', auth()->id())->sum('volunteer_hours') }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <!-- <h3 class="text-lg font-semibold">@lang('Number of Reviews')</h3>
                            <span class="text-2xl font-bold">{{ \App\Models\Review::whereHas('volunteerOpportunity', function ($query) {
                                $query->where('user_id', auth()->id());
                            })->count() }}</span> -->
                            <h3 class="text-lg font-semibold">@lang('Number of Reviews')</h3>
                        <span class="text-2xl font-bold">{{ \App\Models\Review::whereIn('opportunity_id', function ($query) {
                                $query->select('id')->from('volunteer_opportunities')->where('user_id', auth()->id());
                            })->count() }}</span>


                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
