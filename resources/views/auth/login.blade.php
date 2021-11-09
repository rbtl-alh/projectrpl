<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <title>Dora | Login</title>

    <link rel="stylesheet" href="/css/login_style.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title pb-2" style="font-size: 3rem; font-weight: 800">Login</h1>
                        <h3 class="card-title" style="font-size: 2rem; font-weight: 500">Welcome to DoRa</h3>
                        <x-guest-layout>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-group py-3">
                                    <x-label for="email" :value="__('Email')" />

                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                </div>

                                <!-- Password -->
                                <div class="form-group pb-1 mt-4">
                                    <x-label for="password" :value="__('Password')" />

                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                        required autocomplete="current-password" />
                                </div>

                                <!-- Remember Me -->
                                {{-- <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div> --}}

                                <div class="signup pb-3">
                                    <div>Belum punya akun? <a href="{{ url('/register') }}">Daftar disini</a></div>
                                </div>


                                <div class="flex items-center  justify-end mt-4">
                                    {{-- @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif --}}

                                    <x-button class="ml-3">
                                        {{ __('Log in') }}
                                    </x-button>
                                </div>
                            </form>
                            {{-- </x-auth-card> --}}
                        </x-guest-layout>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</body>

</html>
