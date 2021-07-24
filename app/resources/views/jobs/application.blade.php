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


            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                            User
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-sm font-medium tracking-wider text-left text-gray-500 uppercase">
                                            Applied at
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @forelse ($job->applications as $application)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <a href="{{ route('user.show', $application->user_id) }}" class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $application->user->name }}
                                                        </div>
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $application->user->email }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ $application->created_at }}
                                                </div>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
