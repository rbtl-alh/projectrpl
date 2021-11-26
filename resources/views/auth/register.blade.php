@php
$title = 'Register';
@endphp

@extends("layouts.main")

@section('container')

    <div class="row justify-content-center">
        <div class="col-sm-6 mb-10">
            <h1 class="text-center pt-4" style="font-size: 3rem; font-weight: 700;">Registrasi</h1>
            <x-guest-layout>
                <!-- Validation Errors -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div class="form-group pb-3 mt-10">
                        <x-label for="name" :value="__('Nama')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            autofocus />
                        @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Email Address -->
                    <div class="form-group mt-2">
                        <x-label for="email" :value="__('Email')" />
                        
                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                        />
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group mt-2">
                        <x-label for="email" :value="__('Username')" />
                        
                        <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                        required />
                    </div> --}}
                    
                    <!-- Password -->
                    <div class="mt-2">
                        <x-label for="password" :value="__('Password')" />
                        
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                        autocomplete="new-password" />
                        @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Confirm Password -->
                    <div class="mt-2">
                        <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" />
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- <div class="signup pb-3 mt-2">
                        <div>Already registered?<a href="{{ url('/login') }}" class="text-primary"> Login
                                now!</a>
                        </div>
                    </div> --}}

                    <br><br>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

                </form>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                {{-- </x-auth-card> --}}
            </x-guest-layout>
        </div>
    </div>
@endsection
