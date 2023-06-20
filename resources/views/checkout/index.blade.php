@extends('layout.index')
@section('content')

    <main class="cart">
        <div class="header-pages">
            <h1>Количка</h1>
        </div>
        @include('layouts.breadcrumb')
        @if ($errors->any())
            <div class="container">
                <div class="row">
                    <div class="col-md-9 m-alert m-alert--icon alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="container-lg">
            <form id="checkout-form" method="POST" action="/checkout/submitOrder">
                @csrf
                <div class="row">

                    @if (!$cart->items())
                        <div class="col-md-12 no-products-cart">
                            Нямате продукти в количката
                            <br>
                            <a class="site-btn btn btn-lg btn-filled site-color" href="/#category">
                                ПРОДЪЛЖЕТЕ С ПАЗАРУВАНЕТО
                            </a>
                        </div>
                    @else


                        <div class="col-md-9">
                            <div class="main-cart">
                                <div id="cart-view-edits">
                                    <a class="title-step-h" href="#cart-view-edits">
                                        <div class="cart-step-header">
                                            <span class="font-Um">1</span>
                                            <h3>Преглед на продукти</h3>
                                        </div>
                                    </a>
                                    <table id="cart_products" class="cart-table-products order-refresh"
                                        data-replace-html="">
                                        <thead>
                                            <tr>
                                                <th>Продукти в поръчката</th>
                                                <th>Ед. цена</th>
                                                <th>Тегло</th>
                                                <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($cart->items() as $cart_key=>$item)
                                                {{-- {{ dd($item->product) }} --}}
                                                <tr class="rows-products-cart  clearfix">
                                                    <td class="first-cell-cart-table">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td rowspan="4" class="img-product-cart">
                                                                        <a href="/products/{{ $item->product->id }}">
                                                                            <img src="{{ $item->product->images->first()->image }}"
                                                                                style="background-image: url('{{ $item->product->images->first()->image }}')"
                                                                                alt="Elisabetta Franchi 1">
                                                                        </a>
                                                                    </td>
                                                                    <td class="font-Um">{{ $item->product->title }}</td>
                                                                </tr>
                                                                @if (!$item->options->isEmpty())
                                                                    @foreach ($item->options as $k => $option)
                                                                        <tr>
                                                                            <td>{{ $option->attribute->name }}: <span
                                                                                    class="font-Ub">{{ $option->name }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else

                                                                @endif
                                                                <tr>
                                                                    <td>
                                                                        <p>Размер:</p>
                                                                        <span class="cart-table-size">
                                                                            {{ $item->product_variation->size }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>

                                                    <td class="table-cell-unit-price">
                                                        <span>Ед. цена :</span>
                                                        <span
                                                            class="font-Um">{{ currency($item->product_variation->price()) }}</span>
                                                    </td>
                                                    <td class="table-cell-weight">
                                                        <span>Тегло : </span>
                                                        <span> {{ $item->product_variation->weight }} кг.</span>
                                                    </td>
                                                    <td class="delete-table-td">
                                                        <a data-block-ui="#cart-products-row" class="ajax-link"
                                                            href="/cart/remove/{{ $cart_key }}">
                                                            <img src="/img/table-cancel.svg">
                                                            <span>Изтриване</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty

                    @endforelse

                    <tr class="rows-delivery-price">
                        <td colspan="3" class="text-right valign-middle">
                            <p class="text-uppercase ">ЦЕНА НА ПРОДУКТИТЕ:</p>
                        </td>
                        <td class="">
                            <div class="font-Um">{{ currency($cart->totalProducts()) }} </div>
                        </td>
                    </tr>

                    <tr class="rows-delivery-price">
                        <td colspan="3" class="text-right">
                            <p>Доставка:
                                {{--  (
                                <span class="font-Umi">Безплатна доставка на поръчки на стойност над
                                    {{ currency($cart->getFreeShippingThreshold()) }}.</span>
                                )  --}}
                            </p>
                        </td>
                        <td id="js-table-shipping-html">
                            @include('checkout.product_table_shipping_price')
                        </td>
                    </tr>
                    <tr class="rows-delivery-price border-none ">
                        <td colspan="3" class="text-right">
                            <p class="text-uppercase">КРАЙНА ЦЕНА:</p>
                        </td>
                        <td id="final-price">
                            <span>{{ currency($cart->total()) }}</span>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>

                <div id="cart-data-delivery">
                    <a class="title-step-h" href="#cart-data-delivery">
                        <div class="cart-step-header">
                            <span class="font-Um">2</span>
                            <h3>Данни за доставка</h3>
                        </div>
                    </a>
                    <div class="panel-main shipping_details" id="deliveryCollapse">
                        <div class="panel-group shipping_office  shipping_wrapper">
                            <div class="panel-heading">
                                <input class="shipping_method radio-collapse" id="onOffice" name="shipping_method" value="office"
                                    type="radio" data-toggle="collapse" data-target=".onOffice"
                                    data-price="{{ currency($cart->shippingPrice('office')) }}" aria-expanded="false">
                                <div class="input-wrapper">
                                    <label for="onOffice" class="errordiv payment-label payment-label-block">
                                        Взимане от офис 
                                        <strong>({{ currency($cart->shippingPrice('office')) }})</strong>
                                        {{--  <span class="required-star">*</span>  --}}
                                        <span class="gateway">
                                            <img style="" src="/img/logo/ekont.png"
                                                alt="ekont-logo">
                                        </span>
                                    </label>
                                    <i class="fa fa-check"></i>
                                </div>
                            </div>
                            <div class="onOffice collapse" data-parent="#deliveryCollapse" style="">
                                <div class="panel-body">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6  col-12">
                                                <div>
                                                    <label class="errordiv" for="office_full_name">Имена <span class="required-star">*</span></label>
                                                    <input placeholder="Иван Иванов" minlength="5" required id="office_full_name" name="office_full_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div>
                                                    <label  class="errordiv" for="office_city">Град <span class="required-star">*</span></label>
                                                    <input  placeholder="София" name="office_city"  minlength="5" required id="office_city" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                       
                                            <div class="col-md-6 col-12">
                                                <div>
                                                    <label  class="errordiv" for="office_phone">Телефон <span class="required-star">*</span></label>
                                                    <input  placeholder="0892 ** ** **" name="office_phone" minlength="10" required id="office_phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div>
                                                    <label  class="errordiv" for="office_email">Имейл <span class="required-star">*</span></label>
                                                    <input  placeholder="ivanov@gmail.com" name="office_email" minlength="5" required id="office_email" type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <label  class="errordiv" for="office_office">Офис <span class="required-star">*</span></label>
                                                    <input  placeholder="Надежда Бели Дунав" name="office_office" minlength="5" required id="office_office" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="ekont-help">
                                                    <p>(Не знаете кой е най близкия офис на Еконт до вас? <a target="_blank" href="https://www.econt.com/find-office">Вижте тук!</a>)</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" id="type" name="type" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group shipping_address shipping_wrapper">
                            <div class="panel-heading">
                                <input class="shipping_method radio-collapse" id="onAddress" name="shipping_method" value="address"
                                    type="radio" data-toggle="collapse" data-target=".onAddress"
                                    data-price="{{ currency($cart->shippingPrice('address')) }}">
                                <div class="input-wrapper">
                                    <label for="onAddress" class="errordiv payment-label payment-label-block">
                                        Доставка до адрес
                                        <strong>({{ currency($cart->shippingPrice('address')) }})</strong>
                                        {{--  <span class="required-star">*</span>  --}}
                                        <span class="gateway">
                                            <img style="" src="/img/logo/ekont.png"
                                                alt="ekont-logo">
                                        </span>
                                    </label>
                                    <i class="fa fa-check"></i>
                                </div>
                            </div>
                            <div class="onAddress panel-collapse collapse" data-parent="#deliveryCollapse">
                                <div class="panel-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div>
                                                    <label class="errordiv" for="address_full_name">Имена <span class="required-star">*</span></label>
                                                    <input placeholder="Иван Иванов" minlength="5" id="address_full_name" required name="address_full_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div>
                                                    <label class="errordiv" for="address_city">Град <span class="required-star">*</span></label>
                                                    <input placeholder="София" minlength="5" id="address_city" required name="address_city" type="text" class="form-control">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div>
                                                    <label class="errordiv" for="address_phone">Телефон <span class="required-star">*</span></label>
                                                    <input placeholder="0892 ** ** **" minlength="5" id="address_phone" required name="address_phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div>
                                                    <label class="errordiv" for="address_email">Имейл <span class="required-star">*</span></label>
                                                    <input placeholder="ivanov@gmail.com" minlength="5" id="address_email" required name="address_email" type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <label class="errordiv" for="address_address">Пълен адрес <span class="required-star">*</span></label>
                                                    <input placeholder="гр.София кв.Надежа бл.568 вх.А ап.12" minlength="5" id="address_address" required type="text" name="address_address" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="delivery-note">
                            <p>Бележка към поръчката</p>
                            <textarea name="note" id="" rows="4"></textarea>
                        </div>
                    </div>

                </div>

                <div id="cart-payment">
                    <a class="title-step-h" href="#cart-payment">
                        <div class="cart-step-header">
                            <span class="font-Um">3</span>
                            <h3>Начин на плащане</h3>
                        </div>
                    </a>

                    <div class="panel-main" id="paymentMethodCollapse">
                        <div class="panel-group payment-method-row">
                            <div class="panel-heading">
                                <input checked="checked" class="radio-collapse payment_method" name="payment_method"
                                    value="1" type="radio" data-toggle="collapse" data-+target=".cashOnDelivery">
                                <div class="input-wrapper">
                                    <label for="" class="payment-label">
                                        Наложен платеж
                                        <br>
                                        <span class="desc">Използвайте опцията плащане при доставка, ако искате да
                                            закупите продукта чрез наложен платеж.</span>
                                        <br>
                                        <span class="gateway">
                                            <img style="" src="/img/logo/ekont.png"
                                                alt="ekont-logo">
                                    </label>
                                    <i class="fa fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>
                </div>


                @csrf
                <div id="pricing_sidemenu" class="order-refresh col-md-3 col-12" data-replace-html="">
                    @include('checkout.pricing_sidemenu')
                </div>
                @endif

                </div>
                
                <div class="row btm-form-cart">
                    <div class="col-md-9 col-12 text-center">

                        <div class="buttons">
                            {{-- <div id="payment-loading">
                                            <div class="loading-text">Зареждане, моля изчакайте..</div>
                                            <div class="loading-ui permanent">
                                                <div class="b1"></div>
                                                <div class="b2"></div>
                                                <div class="b3"></div>
                                                <div class="b4"></div>
                                                <div class="b5"></div>
                                            </div>
                                        </div> --}}

                                        
                                    <div class="g-recaptcha" data-sitekey="6LcEl28aAAAAAASBM4MNeKIOqRAbS_ofIGmK6GF3"
                                    data-size="invisible" 
                                    data-callback="onSubmit">
                                </div>
                                <button class="site-btn align-content-center btn btn-lg btn-filled site-color">ПОРЪЧАЙ</button>
                            {{--  <button type="submit">ПОРЪЧАЙ</button>  --}}
                            <p class="center-center mrg-btm-none checkout-terms-info" style="margin-top:65px;">
                                С натискането на бутон "поръчай" се съгласявате с нашите
                                <a target="_blank" href="/terms">Общи условия</a>.
                            </p>
                            <p class="center-center supp-info">
                                Ако срещате затруднения с поръчката или имате въпроси - не се колебайте да ни
                                потърсите на: <a class="bold" href="tel: 0879141433"></br> 0879 14 14 33</a> <br><span class="wtime">(09:00 - 17:30)</span>
                            </p>
                        </div>
                    </div>
                </div>
                </form>
        </div>
    </main>
    <script>

        function onSubmit(token) {
          
          document.getElementById("checkout-form").submit();
        }

      </script>
    <div class="modal-ajax-loading">
    </div>
@endsection
