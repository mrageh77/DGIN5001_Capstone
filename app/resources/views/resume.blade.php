<x-fe-layout>
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-9">
                <div class="p-4 bg-white rounded shadow-sm job-header">
                    <h3 class="capitalize job-heading">{{ auth()->user()->name }}</h3>
                    <h5 class="job-info">{{ auth()->user()->city?? '' }}</h5>
                    <h5 class="job-info">{{ auth()->user()->state ?? '' }}, {{ auth()->user()->country ?? '' }}</h5>
                </div>
                <div class="p-4 my-3 bg-white rounded shadow-sm job-description">
                    <strong class="flex mb-2">Manage Profile</strong>
                    @include('profile')
                    <strong class="flex mb-2">Manage Resume</strong>
                    <div class="py-4">
                        <div class="p-2">
                            @if ($message = Session::get('success'))

                                <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                                    class="w-full px-4 py-2 mx-auto mb-4 text-green-800 transition-all bg-green-400 rounded shadow">
                                    <strong>{{ $message }}</strong>

                                </div>
                            @endif

                            @if ($errors->any())
                                <div
                                    class="w-full px-4 py-2 mx-auto mb-4 text-red-800 transition-all bg-red-400 rounded shadow">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form enctype="multipart/form-data" method="POST" action="{{ route('upload-resume') }}">
                                @csrf
                                <div class="grid items-end gap-4 sm:grid-cols-3">
                                    <div class="">
                                        <x-label for="title" :value="__('Title')" />
                                        <x-input id="title" class="block w-full mt-1" type="text" name="title"
                                            :value="old('title')" required autofocus />
                                    </div>
                                    <div class="">
                                        <x-label for="name" :value="__('Resume')" />
                                        <input class="block w-full form-input" type="file" name="resume">
                                    </div>
                                    <div class="pt-3">
                                        <x-button>
                                            {{ __('Upload Resume') }}
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-5 border-t ">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Title
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Resume
                                            </th>
                                            <th scope="col" class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Delete
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($resumes as $resume)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $resume->title }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a target="_blank" href="{{ asset('storage/'.$resume->resume) }}">Click Here</a>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <form action="{{ route('resume.destroy', $resume->id) }}"
                                                            onSubmit="return confirm('Are you sure you wish to delete?');"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="px-2 py-1 text-red-600 hover:text-red-900">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 bg-white rounded shadow-sm job-description">
                    <h4>Quick Links</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('applied-job') }}" class="btn btn-dark w-100"> My Application</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('saved-job') }}" class="btn btn-dark w-100"> Saved Job</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

</x-fe-layout>
