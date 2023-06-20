@extends('layout.index')
@section('content')

    <main class="cart">
        <div class="header-pages">
            <h1>Количка</h1>
        </div>
        @include('layouts.breadcrumb')

        <div id="cart_main" class="container">
            <div class="row order-refresh" id="cart-products-row" data-replace-html="">
                <div class="col-md-12 no-products-cart">Нямате продукти в количката
                    <br>
                    <a class="site-btn btn btn-lg btn-filled site-color" href="/category">
                        ПРОДЪЛЖЕТЕ С ПАЗАРУВАНЕТО
                    </a>
                </div>
            </div>
        </div>
        </div>
    </main>

@endsection
