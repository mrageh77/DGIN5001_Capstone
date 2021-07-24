<x-fe-layout>
    <div class="container py-5">

        @if ($message = Session::get('success'))

        <div x-data="{show: true}"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)" class="w-full px-4 py-2 mx-auto mb-4 text-green-800 transition-all bg-green-400 rounded shadow">
            <strong>{{ $message }}</strong>

        </div>
    @endif
        @forelse ($jobs as $job)
            <div class="mb-4 row align-items-center">
                <div class="col-md-9">
                    <div class="p-4 bg-white rounded shadow-sm job-header">
                        <h3 class="text-xl font-bold job-heading">{{ $job->job->title }}</h3>
                        <h5 class="job-info">{{ $job->job->excerpt }}</h5>
                        <p class="job-info">{{ $job->job->description }}</p>
                    </div>
                </div>
                <div class="mt-4 col-md-3 md:mt-0 text-md-end">

                </div>
            </div>
            @empty
            <div class="mb-4 row align-items-center">
                <div class="col-md-9">
                    <div class="p-4 bg-white rounded shadow-sm job-header">
                        no result !
                    </div>
                </div>
            </div>
            @endforelse
        <div class="mb-4 row align-items-center">
            <div class="col-md-9">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>

</x-fe-layout>
