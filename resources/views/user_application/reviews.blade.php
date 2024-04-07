<!-- resources/views/reviews/index.blade.php -->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('Organization Reviews')</title>

    <!-- Include Font Awesome library without integrity attribute -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        crossorigin="anonymous">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @lang('Organization Reviews')
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        @if ($organizationReviews->isEmpty())
                            <p class="text-gray-500">@lang('No reviews available for the organization\'s volunteer opportunities.')</p>
                        @else
                            @foreach ($organizationReviews as $review)
                                <div class="mb-4">
                                    <h3 class="text-lg font-semibold">{{ $review->opportunity->event_name }}</h3>
                                    <p class="text-gray-600">{{ $review->content }}</p>

                                    <!-- Display the Star Rating -->
                                    <div class="mt-2">
                                        <div class="flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="text-2xl @if ($i <= $review->rating) text-yellow-500 @else text-gray-300 @endif">&#9733;</span>
                                            @endfor
                                        </div>
                                    </div>

                                    <!-- Like and Dislike Buttons with Font Awesome icons -->
                                    <div class="mt-2 flex">
                                        <form method="POST" action="{{ route('reviews.like', $review->id) }}">
                                            @csrf
                                            <button type="submit" class="text-green-500 hover:underline focus:outline-none">
                                                <i class="fas fa-thumbs-up"></i> <span class="font-bold">{{ $review->likes }}</span>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{ route('reviews.dislike', $review->id) }}" class="ml-4">
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:underline focus:outline-none">
                                                <i class="fas fa-thumbs-down"></i> <span class="font-bold">{{ $review->dislikes }}</span>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Add other details you want to display -->
                                </div>
                                <hr class="my-4">
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
