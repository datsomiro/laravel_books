<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Welcome' }} | Laravel Books project</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

{{-- /resources/views/common/navigation.blade.php --}}
            @include('common/navigation')

    @yield('content')

    @yield('alksfkadsand')

    
</body>
</html>