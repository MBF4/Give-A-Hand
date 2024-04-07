<!-- resources/views/reviews/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Review') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('opportunities.store-review', $opportunity->id) }}">
                        @csrf

                        <div class="grid grid-cols-1 gap-6">
                            <!-- Review Content -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700">Review Content</label>
                                <textarea name="content" id="content" class="form-input mt-1 block w-full rounded-md shadow-sm" required></textarea>
                            </div>

<!-- Star Rating -->
<div>
    <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
    <div class="starability-growRotate">
        <input type="radio" id="rate5" name="rating" value="1" />
        <label for="rate5" title="5 stars"></label>

        <input type="radio" id="rate4" name="rating" value="2" />
        <label for="rate4" title="4 stars"></label>

        <input type="radio" id="rate3" name="rating" value="3" />
        <label for="rate3" title="3 stars"></label>

        <input type="radio" id="rate2" name="rating" value="4" />
        <label for="rate2" title="2 stars"></label>

        <input type="radio" id="rate1" name="rating" value="5" />
        <label for="rate1" title="1 star"></label>
    </div>
</div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Review</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
    // Get all radio inputs and their corresponding labels
    const stars = document.querySelectorAll('input[type="radio"]');
    const labels = document.querySelectorAll('label[for^="rate"]');

    // Attach a click event listener to each radio input
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            // Reset all labels to default color (gray)
            labels.forEach(label => label.style.color = 'gray');

            // Change the color of clicked star and previous stars to yellow
            for (let i = index; i >= 0; i--) {
                labels[i].style.color = '#ffc800'; // Darker yellow color
            }
        });
    });

</script>

    <style>
       .starability-growRotate {
    display: inline-block;
    transform-style: preserve-3d;
}

.starability-growRotate input {
    position: absolute;
    opacity: 0;
}

.starability-growRotate label {
    display: inline-block;
    width: 1em;
    font-size: 2em;
    overflow: hidden;
    line-height: 1em;
    margin-right: 0;
    padding: 0;
    cursor: pointer;
    color: gray; /* Initial color */
    transition: color 0.2s ease-out;
}

.starability-growRotate label:before {
    content: "\2605";
    font-family: Arial, sans-serif;
}

.starability-growRotate input:checked ~ label,
.starability-growRotate input:checked ~ label:hover {
    color: #ffc800; /* Darker yellow color */
}
    </style>
</x-app-layout>