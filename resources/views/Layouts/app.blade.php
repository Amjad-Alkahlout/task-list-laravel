<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Task List App</title>
    @yield('styles')
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-3xl mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold mb-6">
        @yield('title')
    </h1>

    @if(session()->has('message'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('message') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>
