<x-fe-layout>
        <div class="container py-5">
            <div class="row align-items-center">
                @if ($message = Session::get('success'))

                <div x-data="{show: true}"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)" class="w-full px-4 py-2 mx-auto mb-4 text-green-800 transition-all bg-green-400 rounded shadow">
                    <strong>{{ $message }}</strong>

                </div>
            @endif
                <div class="col-md-9">
                    <div class="p-4 bg-white rounded shadow-sm job-header">
                        <h3 class="text-xl font-bold job-heading">{{ $job->title }}</h3>
                        <h5 class="job-info">{{$job->excerpt}}</h5>
                        <h5 class="mt-2 font-bold job-info">{{$job->skills}}</h5>
                    </div>
                </div>
                <div class="mt-4 col-md-3 md:mt-0 text-md-center">
                    <form action="{{ route('apply-job') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <button type="submit" class="text-gray-200 btn bg-dark">Apply</button>
                    </form>
                    <form action="{{ route('save-job') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <button type="submit" class="py-1 text-gray-500">Save</button>
                    </form>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-9">
                    <div class="p-4 my-5 bg-white rounded shadow-sm job-description">
                    {!! $job->description !!}
                </div>
                </div>
                <div class="col-md-3">
                    <div class="p-4 my-5 bg-white rounded shadow-sm job-description">
                        <h4>About Company</h4>
                    <p>Working at Siemens is all about curiosity, open-mindedness and inventive talent. About wanting to
                        know more about the world we live in and finding ways to provide the world with a sustainable
                        future.
                        We are looking forward to receiving your information and thank you for your interest in joining our team!</p>
                </div>
            </div>
            </div>
        </div>

    </x-fe-layout>

