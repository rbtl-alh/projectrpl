@php
$title = 'Login';
@endphp

@extends("layouts.main")

@section('container')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-guest-layout>
                <!-- Session Status -->
                <x-auth-session-status :status="session('status')" />
                <!-- Validation Errors -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="text-center pt-4 mb-10" style="font-size: 3rem; font-weight: 700;">Login</h1>
                    <!-- Email Address -->
                    <div class="form-floating mb-4">
                        <x-input id="email" class="form-control" type="email" name="email" placeholder="name@example.com"
                            required />
                        <x-label for="email" value="Email" />
                    </div>

                    <!-- Password -->
                    <div class="form-floating mb-4">
                        <x-input id="password" class="form-control" type="password" name="password" placeholder="12345678"
                            required />
                        <x-label for="password" value="password" />
                    </div>

                    <div class="signup pb-3">
                        <div>Belum punya akun?<a href="{{ url('/register') }}" class="text-primary"> daftar sekarang!</a>
                        </div>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                {{-- </x-auth-card> --}}
                <x-auth-validation-errors class="" :errors="$errors" />
            </x-guest-layout>
        </div>
    </div>
@endsection
