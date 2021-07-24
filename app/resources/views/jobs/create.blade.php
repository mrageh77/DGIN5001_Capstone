<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Job') }}
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
            <div class="overflow-hidden shadow-sm  sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('job.store') }}">
                        @csrf
                        <div class="grid gap-4">
                            <div class="">
                                <x-label for="title" :value="__('Title')" />
                                <x-input id="title" class="block w-full mt-1" type="text" name="title"
                                    :value="old('title')" required autofocus />
                            </div>
                            <div class="">
                                <x-label for="excerpt" :value="__(' Excerpt')" />
                                <textarea class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="excerpt" class="block w-full mt-1"  name="excerpt" rows="3"
                                    :value="old('excerpt')" required></textarea>
                            </div>
                            <div class="">
                                <x-label for="description" :value="__(' Description')" />
                                <textarea class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="description" class="block w-full mt-1"  name="description" rows="6"
                                    :value="old('description')" required></textarea>
                            </div>
                            <div class="">
                                <x-label for="skills" :value="__('Skills')" />
                                <x-input id="skills" class="block w-full mt-1" type="text" name="skills"
                                    :value="old('skills')" />
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
