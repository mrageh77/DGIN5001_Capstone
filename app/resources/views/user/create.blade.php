<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New User') }}
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

            @if ($errors->any())
                <div class="w-full px-4 py-2 mx-auto mb-4 text-red-800 transition-all bg-red-400 rounded shadow">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="">
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="block w-full mt-1" type="text" name="name"
                                    :value="old('name')" required autofocus />
                            </div>
                            <div class="">
                                <x-label for="email" :value="__(' Email')" />
                                <x-input id="email" class="block w-full mt-1" type="email" name="email"
                                    :value="old('email')" required/>
                            </div>
                            <div class="">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="block w-full mt-1" type="password" name="password" />
                            </div>
                            <div class="">
                                <x-label for="password_confirmation" :value="__('Password Confirm')" />
                                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" />
                            </div>
                            <div class="">
                                <x-label for="role" :value="__('Role')" />
                                <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>

                                </select>
                            </div>

                        </div>
                        <div class="flex mt-4">

                            <x-button >
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
