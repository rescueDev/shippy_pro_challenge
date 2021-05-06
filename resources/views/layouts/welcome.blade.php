<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Flight Radar</title>
</head>
<body>

        <div class="row">
            <div class="col-6 mx-auto">
                <a class="btn btn-primary" href="{{route('search')}}">Search flight</a>
            </div>
        </div>
    @yield('content')
    @yield('results')
</body>
</html>