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
<body class="flex justify-center">

    <div class="flex w-full justify-center">
        <a href="/">Home</a>
        <a href="/login">Login</a>
    </div>

    @yield('content')
    
    <div class="w-10/12 my-10 flex">

        {{-- <div class="w-5/12 rounded border p-2">
        
            <livewire:tickets />

        </div>

        <div class="w-5/12 rounded border p-2">
        
            <livewire:comments />

        </div> --}}

    </div>

</body>
</html>