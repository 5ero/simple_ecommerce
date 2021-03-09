<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
         <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app" class="flex flex-col min-h-screen">
                <livewire:toast-messenger />
        
                <livewire:navbar-top />
            
                <livewire:add-to-basket />
                <div class="md:w-10/12 mx-auto flex-grow">
                     {{ $slot }}
                </div>
               
     
                <footer class="pt-10">
                    <div class="bg-gray-100 p-4 h-64">

                    </div>
                </footer>
        </div>
       
    @livewireScripts
    </body>
</html>
