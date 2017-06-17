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

    <title>Admin</title>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


  </head>
    <body>
      <div id="app">
        <div class="columns">
            <aside class="column is-2 aside hero is-fullheight is-hidden-mobile">
              <div>
                <div class="main">
                     <div class="title">Main</div>
                      <a href="/admin/manage" class="item active"><span class="name">Управление сайтом</span></a>
                      <a href="/admin/shops" class="item"><span class="name">Магазины, рестораны</span></a>
                      <a href="#" class="item"><span class="name">Покупатели</span></a>
                      <a href="#" class="item"><span class="name">Заявки</span></a>
                </div>
              </div>
            </aside>
            <div class="column is-10 admin-panel">
                  <nav class="nav has-shadow" id="top">
                    <div class="container">
                      <div class="nav-left">
                            @include('partials.logo')
                      </div>


                      <span class="nav-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                      </span>
                      <div class="nav-right nav-menu is-hidden-tablet">
                        <a href="/admin/manage" class="nav-item is-active">
                          Управление сайтом
                        </a>
                        <a href="#" class="nav-item">
                          Магазины, рестораны
                        </a>
                        <a href="#" class="nav-item">
                          Покупатели
                        </a>
                        <a href="#" class="nav-item">
                          Заявки
                        </a>
                        <div class="nav-item">@include('partials.user')</div>
                      </div>
                      <div class="nav-item is-hidden-mobile">
                               @include('partials.user')
                      </div>
                    </div>
                  </nav>
                  {{-- @include('admin.hero') --}}
                  <section class="section">
                     @yield('content') 
                 </section>
            </div> {{-- div column is-10 --}}
        </div> {{-- div columns --}}
        <flash message="{{ session('flash') }}"></flash>
      </div> {{-- div app --}}
    <script  src="/js/app.js"></script>
    <script  src="/js/admin.js"></script>
     <script  src="/js/jquery.js"></script>
    </body>

</html>