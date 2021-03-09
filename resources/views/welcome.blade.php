<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Balloon Boxes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
       <livewire:styles />
    </head>
    <body>
    <div id="app" class="max-w-7xl mx-auto">
    <livewire:toast-messenger />
    
    <livewire:navbar-top />

    {{-- <div class="w-full h-72 bg-gray-50 border">
        <img src="/img/banner.png" class="object-cover w-full h-full" alt="">
    </div> --}}

    <div class="grid md:grid-cols-3 gap-3 max-w-7xl">
        <div></div>
        <div class="md:col-span-2 border-l border-gray-200">
             <livewire:add-to-basket />
             <livewire:products />
        </div>
    </div>
    
    
    </div>

    <livewire:scripts />
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    
    </body>
</html>
