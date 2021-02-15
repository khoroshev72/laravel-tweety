<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app">
            <section class="px-8 py-4 mb-6">
                <header class="container mx-auto">
                    <h1>
                        <img
                            src="/images/logo.svg"
                            alt="Tweety"
                        >
                    </h1>
                </header>
            </section>
    
            <section class="px-8">
                <main class="container mx-auto">
                    <div class="lg:flex lg:justify-center">
                        <div class="lg:w-32">
                            @include ('inc._sidebar-links')
                        </div>

                        <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
                            @yield('content')
                        </div>

                        <div class="lg:w-1/6">
                            @include ('inc._friends-list')
                        </div>
                    </div>
                </main>
            </section>
        </div>
    </body>
</html>
