<x-guest-layout>
<title>Register</title>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register1') }}">
            @lang('Click here to Register as Organization')
        </a>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number', '+966')" required pattern="\+966\d{9}" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <!-- Specialization -->
        <div class="mt-4">
            <x-input-label for="specialization" :value="__('Specialization')" />
            <select id="specialization" name="specialization" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="" disabled selected>@lang('Select Specialization')</option>
                <option value="medicine">@lang('Medicine')</option>
                <option value="engineering">@lang('Engineering')</option>
                <option value="computer_science">@lang('Computer Science')</option>
                <option value="accounting">@lang('Accounting')</option>
                <option value="business_administration">@lang('Business Administration')</option>
                <option value="finance">@lang('Finance')</option>
                <option value="marketing">@lang('Marketing')</option>
                <option value="human_resources">@lang('Human Resources')</option>
                <!-- Add more options as needed -->
            </select>
            <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
        </div>

        <!-- Education Level -->
        <div class="mt-4">
            <x-input-label for="education_level" :value="__('Education Level')" />
            <select id="education_level" name="education_level" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                <option value="" disabled selected>@lang('Select Education Level')</option>
                <option value="high_school">@lang('High School')</option>
                <option value="bachelor">@lang('Bachelor\'s Degree')</option>
                <option value="master">@lang('Master')</option>
                <option value="phd">@lang('PhD')</option>
                <!-- Add more options as needed -->
            </select>
            <x-input-error :messages="$errors->get('education_level')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                @lang('Already registered?')
            </a>

            <x-primary-button class="ms-4">
                @lang('Register')
            </x-primary-button>

            <input type="hidden" name="type" value="0">
        </div>
    </form>
</x-guest-layout>
