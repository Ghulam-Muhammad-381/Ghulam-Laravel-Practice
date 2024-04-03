<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel 11 Task List App </title>
    @yield('styles')
</head>

<body>
    <h1>@yield('title')</h1>
    @if(session()->has('sucess'))
        <div>{{ session('sucess') }}</div>
    @endif
    <div>
        @yield('content')
    </div>

</body>

</html>
