<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Rendi Oktavian" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta-seo')
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset("img/favicon.ico") }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset("front/css/styles.css") }}" rel="stylesheet" />
    <link href="{{ asset("front/css/custom.css") }}" rel="stylesheet" />
    @stack('css')
</head>

<body>
    @include("front.layout.navbar")
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Rens Blog</h1>
                <p class="lead mb-0">Personal Records to Record Learning Processes and Outcomes</p>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">&copy; Rendi Oktavian - Made with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                </svg> {{ date('Y') }}</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset("front/js/scripts.js") }}"></script>
    @stack('js')
</body>

</html>