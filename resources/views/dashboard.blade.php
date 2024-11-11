<x-app-layout>
    <x-slot name="header">
        <head>
            <!-- Bootstrap 5 CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                    @if(Auth::check() && (Auth::user()->email_verified_at) !=null && session('verified'))
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('mainpage')" :active="request()->routeIs('mainpage')">
                                {{ __('Mainpage') }}
                            </x-nav-link>
                        </div>
                    @endif

                    <div class="mt-6">
                        <h3>Enter your verification code:</h3>
                        <form action="{{route('check')}}" method="POST">
                            @csrf
                            <input type="text" name="code" class="border p-2 mt-2" required placeholder="Enter your 4-digit code">
                            <button type="submit" class="btn btn-primary">Verify Code</button>
                        </form>

                        <!-- Xatolik va muvaffaqiyatli xabarlar -->
                        @if(session('error'))
                            <p class="text-red-500 mt-4">{{ session('error') }}</p>
                        @elseif(session('success'))
                            <p class="text-green-500 mt-4">{{ session('success') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
