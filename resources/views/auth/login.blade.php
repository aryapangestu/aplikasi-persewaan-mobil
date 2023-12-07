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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ URL::asset('assets/js/settings.js') }}" sync></script>
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
                        @include('partials.modal-error')
                        <!-- BEGIN: Login Form -->
                        <form method="POST" action="{{ route('login') }}" class="space-y-4">
                            @csrf
                            {{-- Email --}}
                            <div class="fromGroup">
                                <label for="email" class="block capitalize form-label">{{ __('Email') }}</label>
                                <div class="relative ">
                                    <input type="email" name="email" id="email"
                                        class="form-control py-2 @error('email') !border !border-red-500 @enderror"
                                        placeholder="{{ __('Type your email') }}" autofocus value="{{ old('email') }}">
                                    @include('partials.input-error', [
                                        'messages' => $errors->get('email'),
                                        'class' => 'mt-2',
                                    ])
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="fromGroup">
                                <label for="password" class="block capitalize form-label">{{ __('Password') }}</label>
                                <div class="relative ">
                                    <input type="password" name="password"
                                        class="form-control py-2 @error('password') !border !border-red-500 @enderror"
                                        placeholder="{{ __('password') }}" id="password"
                                        autocomplete="current-password">
                                    @include('partials.input-error', [
                                        'messages' => $errors->get('password'),
                                        'class' => 'mt-2',
                                    ])
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark block w-full text-center">
                                {{ __('Sign In') }}
                            </button>
                        </form>
                        <!-- END: Login Form -->

                        <div
                            class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
                            {{ __('Don\'t have an account?') }}
                            <a href="{{ route('register') }}"
                                class="text-slate-900 dark:text-white font-medium hover:underline">
                                {{ __('Sign Up') }}
                            </a>
                        </div>

                        <div class="w-full px-4 sms:px-0 sm:w-[450px] mt-8">
                            <div class="text-center">
                                <h3 class="font-Outfit font-medium text-2xl text-black pb-3">
                                    Login Credentials
                                </h3>
                            </div>
                            <div class="mt-3">
                                <table class="w-full text-center">
                                    <thead>
                                        <tr>
                                            <th
                                                class="border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                Role</th>
                                            <th
                                                class="border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                Email</th>
                                            <th
                                                class="border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                Password</th>
                                            <th
                                                class="border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                Admin</td>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                admin@example.com</td>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                password</td>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                <button class="text-slate-900 dark:text-white"
                                                    onclick="copyCredential('admin')">
                                                    <iconify-icon icon="lucide:clipboard-copy"></iconify-icon>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                Customer</td>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                customer@example.com</td>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                password</td>
                                            <td
                                                class="py-2 border border-slate-900 text-xs md:text-sm font-outfit text-slate-700">
                                                <button class="text-slate-900 dark:text-white"
                                                    onclick="copyCredential('customer')">
                                                    <iconify-icon icon="lucide:clipboard-copy"></iconify-icon>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function copyCredential(role) {
            // Mendapatkan nilai email dan password berdasarkan peran (admin atau customer)
            let email, password;
            if (role === 'admin') {
                email = 'admin@example.com';
                password = 'password';
            } else if (role === 'customer') {
                email = 'customer@example.com';
                password = 'password';
            }

            // Mengisi formulir login dengan nilai yang diinginkan
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>

    <!-- scripts -->
    <script src="{{ URL::asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
</body>

</html>
