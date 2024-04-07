<!-- resources/views/opportunities/create.blade.php -->

<x-app-layout>
<title>Volunteer Opportunities</title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Create Volunteer Opportunity')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                <form method="POST" action="{{ route('opportunities.store') }}" onsubmit="return validateDates()" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="event_name" class="block text-sm font-medium text-gray-700">@lang('Event Name')</label>
                                <input type="text" name="event_name" id="event_name" class="form-input mt-1 block w-full rounded-md shadow-sm" required />
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">@lang('Description')</label>
                                <textarea name="description" id="description" class="form-input mt-1 block w-full rounded-md shadow-sm" required></textarea>
                            </div>
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">@lang('Location')</label>
                                <input type="text" name="location" id="location" class="form-input mt-1 block w-full rounded-md shadow-sm" required />
                            </div>
                            <div>
                                <label for="volunteer_hours" class="block text-sm font-medium text-gray-700">@lang('Number of Hours')</label>
                                <input type="number" name="volunteer_hours" id="volunteer_hours" class="form-input mt-1 block w-full rounded-md shadow-sm" required />
                            </div>
                            <div class="mt-4">
                                <x-input-label for="specialization" :value="__('Specialization')" />
                                <select id="specialization" name="specialization" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="" disabled selected>@lang('Select Specialization')</option>
                                    <option value="Medicine" {{ old('specialization') == 'Medicine' ? 'selected' : '' }}>@lang('Medicine')</option>
                                    <option value="Engineering" {{ old('specialization') == 'Engineering' ? 'selected' : '' }}>@lang('Engineering')</option>
                                    <option value="Computer science" {{ old('specialization') == 'Computer science' ? 'selected' : '' }}>@lang('Computer Science')</option>
                                    <option value="Accounting" {{ old('specialization') == 'Accounting' ? 'selected' : '' }}>@lang('Accounting')</option>
                                    <option value="Business administration" {{ old('specialization') == 'Business administration' ? 'selected' : '' }}>@lang('Business Administration')</option>
                                    <option value="Finance" {{ old('specialization') == 'Finance' ? 'selected' : '' }}>@lang('Finance')</option>
                                    <option value="Marketing" {{ old('specialization') == 'marketing' ? 'selected' : '' }}>@lang('Marketing')</option>
                                    <option value="Human resources" {{ old('specialization') == 'Human resources' ? 'selected' : '' }}>@lang('Human Resources')</option>
                                </select>
                                <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
                            </div>
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">@lang('Start Date')</label>
                                <input type="datetime-local" name="start_date" id="start_date" class="form-input mt-1 block w-full rounded-md shadow-sm" required />
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">@lang('End Date')</label>
                                <input type="datetime-local" name="end_date" id="end_date" class="form-input mt-1 block w-full rounded-md shadow-sm" required />
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                                <input type="file" name="image" id="image" accept="image/*">
                            </div>
                
                            <div id="dateValidation" class="text-red-600 font-bold"></div>
                            <div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">@lang('Create Opportunity')</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function validateDates() {
            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(document.getElementById('end_date').value);

            var validationMessage = document.getElementById('dateValidation');

            if (endDate <= startDate) {
                validationMessage.innerText = '@lang('End Date must be after Start Date.')';
                validationMessage.style.fontWeight = 'bold';
                validationMessage.style.marginTop = '-10px'; // Adjust as needed
                return false;
            } else {
                validationMessage.innerText = '';
                return true;
            }
        }
    </script>
</x-app-layout>
