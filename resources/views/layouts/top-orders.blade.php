<div class="container mrg-top-70">
    <h3 class="h3">Най поръчвани</h3>
    <div class="row">
        @foreach ($topOrders  as $topOrder)
        

        <div class="col-md-3 col-sm-6 ">
            <div class="product-grid box">
                {{--  @if ($topOrder->id == '7' )
                    <div class="ribbon ribbon-promo ribbon-top-left"><span>Промоция</span></div>
                @endif 
                
                @if ($topOrder->id == '3' )
                    <div class="ribbon ribbon-new ribbon-top-left"><span>Нов</span></div>
                @endif   --}}
                <div class="product-image">
                    <a href="/products/{{$topOrder->id}}">
                        <div>
                          @forelse ($topOrder->images as $k=>$image)
                            <img class="pic-{{($k+1)}}" src="{{$image->image}}" style="background-image: url('{{$image->image}}')">
                            @empty
          
                            <img class="pic-1" src="/" style="background-image:url('/img/no-image.png')">
                            <img class="pic-2" src="/" style="background-image:url('/img/no-image.png')">
                            @endforelse
                        </div>
                    </a>
                    <ul class="social">
                        <li>
                              @forelse ($topOrder->images as $image)
          
                              <a href="{{$image->image}}" data-fancybox="images-preview-{{$topOrder->id}}"
                                    data-thumb="{{$image->image}}"><i class="fa fa-search"></i></a>
                              @empty
                              {{-- <img class="pic-1" src="/img/no-image.png" style="background-image:url('/img/no-image.png')"> --}}
                              {{-- <img class="pic-2" src="/img/no-image.png" style="background-image:url('/img/no-image.png')"> --}}
                              @endforelse
                        </li>
                    </ul>
                    <a href="/products/{{$topOrder->id}}
                      " class="select-options" ><i class="fa fa-arrow-right"></i> Към продукта</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="/products/{{$topOrder->id}}">{{$topOrder->title}}</a></h3>
                    <div class="price">{{currency($topOrder->minPrice())}} - {{currency($topOrder->maxPrice())}} </div>
                </div>
            </div>
          </div>
          
      @endforeach
    </div>
</div>
