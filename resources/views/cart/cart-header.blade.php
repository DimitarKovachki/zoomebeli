<div class="shopping-bag-dropdown cart-menu">
    <div class="scroll-wrapper">
        <div id="js-mini_cart_wrapper" class="wrapper-cart-item">
            @forelse ($cart->items() as $k=>$cart_item)
            @include('cart.cart-header_item',['cart_item'=>$cart_item,'array_key'=>$k])

            @empty
                <div class="empty-cart">
                    Няма артикули в количката
                </div>
            @endforelse
        </div>
        @if($cart)
        <div id="js-mini_cart_total_wrapper" class="footer-cart-menu">
            @include('cart.cart-header-total',['cart'=>$cart])
        </div>

        @endif
    </div>
</div>
