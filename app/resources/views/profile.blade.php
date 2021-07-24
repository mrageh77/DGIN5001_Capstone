{{-- <x-fe-layout> --}}
            @if ($message = Session::get('success'))

                <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                    class="w-full px-4 py-2 mx-auto mt-2 mb-2 text-green-800 transition-all bg-green-400 rounded shadow">
                    <strong>{{ $message }}</strong>

                </div>
            @endif

            @if ($errors->any())
                <div class="w-full px-4 py-2 mx-auto mt-2 mb-4 text-red-800 transition-all bg-red-400 rounded shadow">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-5 overflow-hidden sm:rounded-lg">
                <div class="">
                    <form method="POST" action="{{ route('update-profile') }}">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="">
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="block w-full mt-1" type="text" name="name"
                                    value="{{ $profile['name'] }}" required autofocus />
                            </div>
                            <div class="">
                                <x-label for="email" :value="__(' Email')" />
                                <x-input id="email" class="block w-full mt-1" type="email" name="email"
                                value="{{ $profile['email'] }}" required />
                            </div>
                            <div class="">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="block w-full mt-1" type="password" name="password" />
                            </div>
                            <div class="">
                                <x-label for="password_confirmation" :value="__('Password Confirm')" />
                                <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                                    name="password_confirmation" />
                            </div>

                            <div class="">
                                <x-label for="city" :value="__(' City')" />
                                <x-input id="city" class="block w-full mt-1" type="text" name="city"
                                value="{{ $profile['city'] }}" required />
                            </div>
                            <div class="">
                                <x-label for="state" :value="__(' State')" />
                                <x-input id="state" class="block w-full mt-1" type="text" name="state"
                                value="{{ $profile['state'] }}" required />
                            </div>
                            <div class="">
                                <x-label for="country" :value="__(' Country')" />
                                <x-input id="country" class="block w-full mt-1" type="text" name="country"
                                value="{{ $profile['country'] }}" required />
                            </div>

                        </div>
                        <div class="flex mt-4">

                            <x-button>
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
