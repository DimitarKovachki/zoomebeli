<div class="aside-cart font-Um sticky-top">
    <div>
        <p>Доставка:</p>
        {{--  <i class="font-Umi">(Безплатна доставка на поръчки на стойност над {{currency($cart->getFreeShippingThreshold())}}.)</i>  --}}
        <span class="font-Ub">{{currency($cart->shippingPrice())}}</span>
    </div>
    <div class="cart-final-price">
        <p>КРАЙНА ЦЕНА:</p>
        <span class="font-Ub">{{currency($cart->total())}}</span>
    </div>
</div>
