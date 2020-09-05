<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.7.6/tailwind.min.css    ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <livewire:styles />
    <livewire:scripts />

    <script src="{{ asset('js/app.js') }}"></script>  

</head>

<body class="flex flex-wrap justify-center">

    <div class="flex w-full justify-left px-4 bg-purple-900 text-white">
        <a href="/" class="mx-3 py-4">Home</a>
        <a href="/login" class="mx-3 py-4">Login</a>
    </div>

    <div class="my-10 flex justify-center">
        @yield('content')
    </div>
        
</body>
</html>