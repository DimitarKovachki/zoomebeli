<div class="cart-item">
    <div class="cart-item-main">
        <div>
            <a href="/products/{{$cart_item->product->id}}">
                <img class="img-cp" src="{{$cart_item->product->images->first()->image}}"
                    style="background-image: url('{{$cart_item->product->images->first()->image}}')"
                    alt="">
            </a>
        </div>
        <div class="ci-right">
            <div class="delete-cart-item">
                <a href="/cart/remove/{{$array_key}}" class="ajax-link" data-success="refresh" data-method="post">
                    <img src="/img/svg/table-cancel.svg">
                </a>
            </div>
            <h3>
                <a href="/products/{{$cart_item->product->id}}">
                    {{$cart_item->product->title}}
                </a>
            </h3>
            <div class="info-cart-product">
                    <p>Размер</p>
                    <span class="cart-table-size">{{$cart_item->product_variation->size}}</span>

            </div>
            <div class="price-cart-product">
                <span>{{currency($cart_item->product_variation->price())}}</span>
            </div>
        </div>
    </div>
</div>
