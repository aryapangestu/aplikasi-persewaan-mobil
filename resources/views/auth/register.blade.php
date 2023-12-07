<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'dashcode') }}</title>

    <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->
</head>

<body class=" font-inter skin-default">
    <div class="loginwrapper">
        <div class="lg-inner-column">
            <div class="right-column  relative">
                <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
                    <div class="auth-box h-full flex flex-col justify-center">
                        <div class="mobile-logo text-center mb-6 lg:hidden block">
                            <a href="index.html">
                                <img src="assets/images/logo/logo.svg" alt="" class="mb-10 dark_logo">
                                <img src="assets/images/logo/logo-white.svg" alt="" class="mb-10 white_logo">
                            </a>
                        </div>
                        <div class="text-center 2xl:mb-10 mb-4">
                            <h4 class="font-medium">Sign in</h4>
                            <div class="text-slate-500 text-base">
                                Sign in to your account to start using Sewa Mobil
                            </div>
                        </div>

                        <!-- BEGIN: Registration Form -->
                        <form method="POST" action="{{ route('register') }}" class="space-y-4">
                            @csrf
                            {{-- Name --}}
                            <div class="fromGroup">
                                <label for="name" class="block capitalize form-label">
                                    {{ __('Name') }}
                                </label>
                                <input type="text" name="name" id="name"
                                    class="form-control py-2 @error('name') !border !border-red-500 @enderror"
                                    placeholder="{{ __('Type your full name') }}" required autofocus
                                    value="{{ old('name') }}">
                                @include('partials.input-error', [
                                    'messages' => $errors->get('name'),
                                    'class' => 'mt-2',
                                ])
                            </div>

                            {{-- Email --}}
                            <div class="fromGroup">
                                <label for="email" class="block capitalize form-label">
                                    {{ __('Email') }}
                                </label>
                                <input type="email" name="email" id="email"
                                    class="form-control py-2 @error('email') !border !border-red-500 @enderror"
                                    placeholder="{{ __('Type your email') }}" required value="{{ old('email') }}">
                                @include('partials.input-error', [
                                    'messages' => $errors->get('email'),
                                    'class' => 'mt-2',
                                ])
                            </div>

                            {{-- Address --}}
                            <div class="fromGroup">
                                <label for="address" class="block capitalize form-label">
                                    {{ __('Address') }}
                                </label>
                                <input type="text" name="address" id="address"
                                    class="form-control py-2 @error('address') !border !border-red-500 @enderror"
                                    placeholder="{{ __('Type your Address') }}" required autofocus
                                    value="{{ old('address') }}">
                                @include('partials.input-error', [
                                    'messages' => $errors->get('address'),
                                    'class' => 'mt-2',
                                ])
                            </div>

                            {{-- Phone Number --}}
                            <div class="fromGroup">
                                <label for="phone_number" class="block capitalize form-label">
                                    {{ __('Phone Number') }}
                                </label>
                                <input type="text" name="phone_number" id="phone_number"
                                    class="form-control py-2 @error('phone_number') !border !border-red-500 @enderror"
                                    placeholder="{{ __('Enter your phone number') }}" required autofocus
                                    value="{{ old('phone_number') }}">
                                @include('partials.input-error', [
                                    'messages' => $errors->get('phone_number'),
                                    'class' => 'mt-2',
                                ])
                            </div>

                            {{-- Driving License Number --}}
                            <div class="fromGroup">
                                <label for="driving_license_number" class="block capitalize form-label">
                                    {{ __('Driving License Number') }}
                                </label>
                                <input type="text" name="driving_license_number" id="driving_license_number"
                                    class="form-control py-2 @error('driving_license_number') !border !border-red-500 @enderror"
                                    placeholder="{{ __('Enter your driving license number') }}" required autofocus
                                    value="{{ old('driving_license_number') }}">
                                @include('partials.input-error', [
                                    'messages' => $errors->get('driving_license_number'),
                                    'class' => 'mt-2',
                                ])
                            </div>

                            {{-- Password --}}
                            <div class="fromGroup">
                                <label for="password" class="block capitalize form-label">
                                    {{ __('Password') }}
                                </label>
                                <input type="password" name="password" id="password"
                                    class="form-control py-2 @error('password') !border !border-red-500 @enderror"
                                    placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                @include('partials.input-error', [
                                    'messages' => $errors->get('password'),
                                    'class' => 'mt-2',
                                ])
                            </div>

                            <button class="btn btn-dark block w-full text-center">Create an account</button>
                        </form>
                        <div
                            class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-8 uppercase text-sm">
                            <span> {{ __('ALREADY REGISTERED?') }}</span>
                            <a href="{{ route('login') }}"
                                class="text-slate-900 dark:text-white font-medium hover:underline">
                                {{ __('Sign In') }}
                            </a>
                        </div>
                    </div>
                    <div class="auth-footer text-center">
                        Copyright 2021, Dashcode All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/rt-plugins.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
