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
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};

    </script>


  </head>
    <body>
      <div id="app">
        <div class="columns">
            <aside class="column is-3 aside hero is-fullheight is-primary is-hidden-mobile">
              <div>
                <div class="main">
                  <div class="title">Меню</div>
                    <a href="{{url('/orders')}}"  class="item active"><span class="name">Заявки</span></a>
                    <a href="{{url('/products')}}" class="item"><span class="name">Продукты/товары/меню</span>
                    <a href="{{url('/products/create')}}" class="item"><span class="name">Добавить продукт, товар</span>
                    <a href="{{url('/rates')}}" class="item"><span class="name">Тарифы на доставку</span></a>
                  </a>
                </div>
              </div>
            </aside>
            <div class="column is-9 admin-panel">
                  <nav class="nav has-shadow" id="top">
                    <div class="nav-left">
                       @include('partials.new.logo')
                    </div>
                    <span class="nav-toggle">
                      <span></span>
                      <span></span>
                      <span></span>
                    </span>
                    {{-- Tablet an Mobile SCREEN --}}
                    <div class="nav-rightnav-menu is-hidden-tablet">
                        <a href="{{url('/orders')}}"  class="nav-item is-active">
                          Заявки
                        </a>
                        <a href="{{url('/products')}}" class="nav-item">
                          Продукты/товары/меню
                        </a>
                        <a href="{{url('/products/create')}}" class="nav-item">
                          Добавить продукт, товар
                        </a>
                        <a href="{{url('/rates')}}" class="nav-item">
                          Тарифы
                        </a>
                        <div class="nav-item">
                               @include('partials.new.user')
                        </div>
                    </div>
                    <div class="nav-item is-hidden-mobile">
                             @include('partials.new.user')
                    </div>
                  </nav>
                  {{-- @include('shopadmin.hero') --}}
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