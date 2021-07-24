<x-fe-layout>
    <div class="container py-5">
        <div class="mb-4 row align-items-center">
            <div class="col-md-9">
                <form method="GET" action="{{ route('homepage') }}">
                    {{-- @csrf --}}
                    <div class="flex p-4 bg-white shadow">
                        <x-input id="search" class="block w-full" type="text" name="search"
                        value="{{ request('search') }}" required autofocus placeholder="Search" />
                        {{-- <input class="w-full p-2 rounded" type="text" placeholder="Try 'Los Angeles'"> --}}
                        <x-button >
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
        @if ($message = Session::get('success'))

                <div x-data="{show: true}"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)" class="w-full px-4 py-2 mx-auto mb-4 text-green-800 transition-all bg-green-400 rounded shadow">
                    <strong>{{ $message }}</strong>

                </div>
            @endif
            @foreach ($jobs as $job)
        <div class="mb-4 row align-items-center">
            <div class="col-md-9">
                <div class="p-4 bg-white rounded shadow-sm job-header">
                    <h3 class="text-xl font-bold job-heading">{{ $job->title }}</h3>
                    <h5 class="job-info">{{ $job->excerpt }}</h5>
                </div>
            </div>
            <div class="mt-4 col-md-3 md:mt-0 text-md-end">
                <div class="flex flex-col mx-auto text-center sm:w-36">
                    <a href="{{ route('job.single', $job->id) }}" class="btn btn-dark">Apply Now</a>
                    <form action="{{ route('save-job') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <button type="submit" class="py-1 text-gray-500">Save</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="mb-4 row align-items-center">
            <div class="col-md-9">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>

</x-fe-layout>
