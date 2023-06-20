<div class="ch-basket active-cart">
    <span>{{($cart->count())}}</span>
    <img src="/img/svg/cart.svg" alt="">
</div>
<div class="ch-price">
    @if(!$cart)
    0.00 <span>лв.</span>
    @else
    {{currency($cart->totalProducts())}}

    @endif
</div>
@include('cart.cart-header')
