<div class="card">
    <div class="card-image">
        <figure class="image is-1by1">
           <img src="/app/{{$product->photo_path}}" alt="">
        </figure>
    </div>
  <div class="card-content">
      <div class="content">
          <p class="subtitle is-6 has-text-centered">
                  {{ $product->name}} 
            <small>{{$product->price}} тг.</small>
          </p>
          <p class="has-text-centered">
            <a class="button is-info is-outlined is-medium" @click.prevent="AddToCart">Заказать</a>
          </p>
      </div>
  </div>
</div>
