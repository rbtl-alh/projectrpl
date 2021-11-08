<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-8">
                <div class="card">
                    <h1 class="text-center pt-4" style="font-size: 3rem; font-weight: 700;">Sign Up</h1>
                    <center><h1 style="font-size: 2rem; font-weight: bold;">Welcome to Dora!</h1></center>
                    
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                    <div class="card-body">
                        <x-guest-layout>
                            {{-- <x-auth-card> --}}
                                {{-- <x-slot name="logo">
                                    <a href="/">
                                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                                    </a>
                                </x-slot> --}}
                                
                        
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                        
                                    
                                    <!-- Name -->
                                    <div class="form-group pb-3">
                                        <x-label for="name" :value="__('Name')" />
                        
                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                    </div>
                        
                                    <!-- Email Address -->
                                    <div class="form-group mt-4">
                                        <x-label for="email" :value="__('Email')" />
                        
                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    </div>
                                    <div class="form-group mt-4">
                                        <x-label for="email" :value="__('Username')" />
                        
                                        <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
                                    </div>
                        
                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-label for="password" :value="__('Password')" />
                        
                                        <x-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />
                                    </div>
                        
                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-label for="password_confirmation" :value="__('Confirm Password')"/>
                        
                                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password_confirmation" required />
                                    </div>
                        
                                    <div class="flex items-center justify-end mt-4">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                            {{ __('Already registered?') }}
                                        </a>
                        
                                        <x-button class="ml-4">
                                            {{ __('Register') }}
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
</body>