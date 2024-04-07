<x-app-layout>
    <x-slot name="header">
    <title>Attended Opportunities</title>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Attended Opportunities')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($attendedOpportunities->isEmpty())
                        <p class="text-gray-500">@lang('You haven\'t attended any volunteer opportunities yet.')</p>
                    @else
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('print.certification', ['userId' => $attendedOpportunities->first()->user->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Print Certification')</a>
                        </div>
                        
                        @foreach($attendedOpportunities as $attendedOpportunity)
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold">{{ $attendedOpportunity->opportunity->event_name }}</h3>
                                <p class="text-gray-600">{{ $attendedOpportunity->opportunity->description }}</p>
                                @if ($attendedOpportunity->opportunity->reviews->where('user_id', Auth::id())->isEmpty())
                                    <div class="mt-2">
                                        <a href="{{ route('opportunities.add-review', $attendedOpportunity->opportunity->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Add Review')</a>
                                    </div>
                                @else
                                    <div class="mt-2">
                                        <div class="flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="text-2xl @if ($i <= $attendedOpportunity->opportunity->reviews->where('user_id', Auth::id())->first()->rating) text-yellow-500 @else text-gray-300 @endif">&#9733;</span>
                                            @endfor
                                        </div>
                                        <p class="text-green-500">@lang('You have already added a review.')</p>
                                    </div>
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
