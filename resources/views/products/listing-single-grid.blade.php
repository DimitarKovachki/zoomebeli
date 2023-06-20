<div class="col-md-3 col-sm-6">
  <div class="product-grid box">
      <div class="product-image">
          <a href="/products/{{$product->id}}">
              <div>
                @forelse ($product->images as $k=>$image)
                    <img class="pic-{{($k+1)}}" src="{{$image->image}}" style="background-image: url('{{$image->image}}')">
                  @empty

                  <img class="pic-1" src="/img/no-image.png" style="background-image:url('/img/no-image.png')">
                  <img class="pic-2" src="/img/no-image.png" style="background-image:url('/img/no-image.png')">
                  @endforelse
              </div>
          </a>
          <ul class="social">
              <li>
                    @forelse ($product->images as $image)

                    <a href="{{$image->image}}" data-fancybox="images-preview-{{$product->id}}"
                          data-thumb="{{$image->image}}"><i class="fa fa-search"></i></a>
                    @empty

                    {{-- <img class="pic-1" src="/img/no-image.png" > --}}
                    {{-- <img class="pic-2" src="/img/no-image.png" > --}}
                    @endforelse
              </li>
          </ul>
          <a href="/products/{{$product->id}}" class="select-options" ><i class="fa fa-arrow-right"></i> Към продукта</a>
      </div>
      <div class="product-content">
          <h3 class="title"><a href="/products/{{$product->id}}">{{$product->title}}</a></h3>
          <div class="price">{{currency($product->minPrice())}} - {{currency($product->maxPrice())}} </div>
      </div>
  </div>
</div>
