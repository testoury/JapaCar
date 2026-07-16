<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? 'JAPA CARS'}}</title>
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
  </head>
  <body class="bg-grey text-third ">
      <x-navbar />
      <div class="min-vh-100">
          {{ $slot }}
        </div>
        <x-footer />
  </body>
</html>
