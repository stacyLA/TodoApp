<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>test extend</title>
</head>
<body class="bg-yellow-100 min-h-screen flex flex-col">
    <header class="bg-pink-800 text-blue-sm h-12 flex items-center justify-right">
        @include('layouts.header')
    </header>
    <div class="container mx-auto flex flex-1">
    <div class="bg-orange-300 text-green-100 w-1/4 h-full flex items-center justify-center">
        @include('layouts.sidebar')
    </div>
    <div class="bg-green-300 text-orange-400 w-3/4  flex items-center justify-center">
        @yield('content')

    </div>
    </div>
    <footer class="bg-red-500 text-blue-800 h-12 flex items-center justify-right">
        @include('layouts.footer')
    </footer>
</body>
</html>