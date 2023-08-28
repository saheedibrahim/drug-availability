<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Availability - @yield('title')</title>
</head>
<body>
    @section('sidebar')
    @show
    <div class="container">
        @if(Session::has('error'))
            <p>{{ Session::get('error') }}</p>
        @endif
        @yield('content')
    </div>
</body>
</html>