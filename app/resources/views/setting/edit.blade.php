<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Settings') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))

                <div x-data="{show: true}"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)" class="w-full px-4 py-2 mx-auto mb-4 text-green-800 transition-all bg-green-400 rounded shadow">
                    <strong>{{ $message }}</strong>

                </div>
            @endif
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('settings.update') }}">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="">
                                <x-label for="company_name" :value="__('Company Name')" />
                                <x-input id="company_name" class="block w-full mt-1" type="text" name="company_name"
                                    value="{{ $settings['company_name'] ?? '' }}" required autofocus />
                            </div>
                            <div class="">
                                <x-label for="company_email" :value="__('Company Email')" />
                                <x-input id="company_email" class="block w-full mt-1" type="text" name="company_email"
                                    value="{{ $settings['company_email'] ?? '' }}" />
                            </div>
                            <div class="">
                                <x-label for="company_phone" :value="__('Company Phone')" />
                                <x-input id="company_phone" class="block w-full mt-1" type="text" name="company_phone"
                                    value="{{ $settings['company_phone'] ?? '' }}" />
                            </div>
                            <div class="">
                                <x-label for="footer_text" :value="__('Footer Text')" />
                                <x-input id="footer_text" class="block w-full mt-1" type="text" name="footer_text"
                                    value="{{ $settings['footer_text'] ?? '' }}" />
                            </div>


                        </div>
                        <div class="grid gap-4">
                            <div class="mt-4">
                            <x-label for="company" :value="__('About Company (HTML tags works) ')" />
                            <textarea id="company" rows="10" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="company">{{ $settings['company'] ?? '' }}</textarea>
                        </div>
                    </div>
                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
