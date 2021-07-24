<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manage Jobs') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                    class="w-full px-4 py-2 mx-auto mb-4 text-green-800 transition-all bg-green-400 rounded shadow">
                    <strong>{{ $message }}</strong>

                </div>
            @endif
            <div class="flex items-center justify-between">
                <a href="{{ route('job.create') }}"
                    class="w-32 px-4 py-2 mb-4 text-white bg-indigo-500 rounded-md shadow hover:bg-indigo-700">Create
                    Job</a>
                <form method="POST" enctype="multipart/form-data" action="{{ route('import.jobs') }}">
                    @csrf
                    <div class="flex">
                        <input class="form-control" type="file" name="jobs">
                        <x-button>Submit</x-button>
                    </div>
                </form>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Skills
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Application
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @forelse ($jobs as $job)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $job->title }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $job->skills }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <a class="px-4 py-2 text-white bg-indigo-500 rounded shadow hover:text-gray-200"
                                                        href="{{ route('job.application', $job->id) }}">Application</a>
                                                    </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                <form action="{{ route('job.destroy', $job->id) }}"
                                                    onSubmit="return confirm('Are you sure you wish to delete?');"
                                                    method="POST">

                                                    <a class="px-2 py-1 text-indigo-600 hover:text-indigo-800"
                                                            href="{{ route('job.edit', $job->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-2 py-1 text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>

                                            <td colspan="3" class="px-6 py-4 whitespace-nowrap">
                                                <div class="py-4 text-xl font-bold text-center text-gray-600">No result
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                            <div class="px-6 py-2 bg-white border-t border-gray-100">
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
