<nav class="breadcrumb has-dot-separator" aria-label="breadcrumbs">
    <ul>
    			{{-- <li>
                    <a href="#"><strong>Категории</strong></a>
                </li> --}}
          @foreach($categories as $cat)
                <li>
                    <a href="{{ url('cities/'.$city->slug . '/' . $cat->slug . '/shops') }}">{{ $cat->name }}</a>
                </li>
           @endforeach
      </ul>
</nav>