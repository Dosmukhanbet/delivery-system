<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/app.css" >
    <link rel="stylesheet" href="/css/admin.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


  </head>
    <body>
       @include('partials.nav')     
        <div id="app">
                @yield('content') 

      @if (session('flash'))
        {{ dd(session('flash')) }}
      @endif

              <flash message="{{ session('flash') }}"></flash>
        </div>
      
       <div>
              @include('partials.footer')
       </div>
    <script  src="/js/app.js"></script>
    <script  src="/js/admin.js"></script>
    <script  src="/js/jquery.js"></script>
    </body>

</html>