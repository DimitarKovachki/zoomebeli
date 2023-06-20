{{--
<div class="basket-count" id="cartBtn" data-replace-html>

    <a href="/cart" class="basket-cta">
        <div class="b-count-main">
            <div class="position-relative d-inline-block">
                <span>{{isset($checkout) ? $checkout->getProducts()->collection->count() : 0}}</span>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  </svg>
            </div>
            @if(isset($checkout))
            @include('client.navbar.price')
            @endif
        </div>
    </a>

    @if(isset($checkout) && !$checkout->products->isEmpty())

    @if(request()->header('x-ajax'))
        <script>
            @if ($checkout->getProducts()->collection->count() > 1)
                $('.scrollbar-inner').scrollbar();
            @endif
        </script>
    @endif

    <div class="cart-menu">
        <div class="wrapper-cart-item scrollbar scrollbar-inner">
            @foreach ($checkout->products->get() as $product)
                <div class="cart-item">
                    <div class="cart-item-main">
                        <div>
                            <a href="{{route('products.show',$product->getTranslation() ? $product->getTranslation()->slug : "")}}">
                                <img class="img-cp" src="{{$product->getNthImage(0)->thumb()}}" style="background-image:url('{{$product->getNthImage(0)->thumb()}}')" alt="">
                            </a>
                        </div>
                        <div>
                            <div class="delete-cart-item">
                                <a href="/cart/remove/{{$product->model->id}}" class="ajax-link" data-method="post">
                                    <img src="/img/table-cancel.svg">
                                </a>
                            </div>
                            <h3>
                                <a href="{{route('products.show',$product->getTranslation() ? $product->getTranslation()->slug : "")}}">
                                    {{$product->getName()}}
                                </a>
                            </h3>
                            <div class="size-cart-item">
                                <p>{{__('phrases.navbar.cart.size')}}</p>
                                <span class="cart-table-size">{{$product->getSize()}}</span>
                            </div>
                            <div class="price-cart-item">
                                <span>{{$product->getPrice()->current()}}</span>
                                <span class="inner"><span class="outer">{{$product->getPrice()->old()}}</span></span>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

        <div class="footer-cart-menu">
            <p>{{__('phrases.navbar.cart.total')}}: <span class="font-Um">{{$checkout->getTotalTotal()}}</span></p>
            @if(false)
            <div class="delete-table-td">
                <a href="#">
                    <span>{{__('phrases.navbar.cart.clear_all')}}</span>
                    <img src="/img/table-cancel.svg">
                </a>
            </div>
            @endif
            <a href="/cart" class="orange-bck">
                <img src="/img/cart-basekt.svg" alt="">
                <span>{{__('phrases.navbar.cart.to_order')}}</span>
            </a>
        </div>
    </div>
    @endif
</div>  --}}
