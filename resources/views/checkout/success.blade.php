@extends('layout.index')
@section('content')

    <main class="success">
        <div class="header-pages">
            <h1>Успешно направена поръчка</h1>
        </div>
        @include('layouts.breadcrumb')

        <div id="cart_main" class="container">
            <div class="row order-refresh" id="cart-products-row" data-replace-html="">
                <div class="col-md-12 no-products-cart">Успешно направена поръчка, очаквайте да се свържем с вас.
                    <br>
                    <a class="site-btn btn btn-lg btn-filled site-color" href="/#category">
                        ПРОДЪЛЖЕТЕ С ПАЗАРУВАНЕТО
                    </a>
                </div>
            </div>
        </div>
        </div>
    </main>

@endsection
