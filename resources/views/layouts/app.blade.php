<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <div>
                <div class="logo-box">
                    <img src="https://i.picsum.photos/id/828/200/200.jpg?hmac=XDYHUvU1Ha9LQrkNk3svII_91vwnQqo8C0yWMqCt6V8"
                        alt="" srcset="">
                </div>
                <div>
                    <h4>company Logo</h4>
                </div>
            </div>
            <div>
                <div class="user-avater">
                    <img src="https://i.picsum.photos/id/828/200/200.jpg?hmac=XDYHUvU1Ha9LQrkNk3svII_91vwnQqo8C0yWMqCt6V8"
                        alt="" srcset="">
                    <strong>User Name</strong>
                </div>
                <div>
                    <button>login button</button>
                </div>
                <div>
                    <button>logout button</button>
                </div>

            </div>
        </header>
        <x-admin.sidebar></x-admin.sidebar>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            footer
        </footer>
    </div>
</body>

</html>
