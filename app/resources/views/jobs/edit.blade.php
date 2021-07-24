<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Job') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))

                <div x-data="{show: true}"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)" class="mx-auto transition-all bg-green-400 rounded shadow mb-4 text-green-800 px-4 py-2 w-full">
                    <strong>{{ $message }}</strong>

                </div>
            @endif

            @if ($errors->any())
                <div class="mx-auto transition-all bg-red-400 rounded shadow mb-4 text-red-800 px-4 py-2 w-full">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('job.update', $job->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4">
                            <div class="">
                                <x-label for="title" :value="__('Title')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                    value="{{ $job->title }}" required autofocus />
                            </div>
                            <div class="">
                                <x-label for="excerpt" :value="__(' Excerpt')" />
                                <textarea class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="excerpt" class="block mt-1 w-full"  name="excerpt" rows="3"
                                    required>{{ $job->excerpt }}</textarea>
                            </div>
                            <div class="">
                                <x-label for="description" :value="__(' Description')" />
                                <textarea class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="description" class="block mt-1 w-full"  name="description" rows="6"
                                     required>{{ $job->description }}</textarea>
                            </div>
                            <div class="">
                                <x-label for="skills" :value="__('Skills')" />
                                <x-input id="skills" class="block mt-1 w-full" type="text" name="skills"
                                    value="{{ $job->skills }}" />
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
