@extends('layout.index')
@section('content')

    <main class="custom-success">
        <div class="header-pages">
            <h1>Успешно изпратено съобщение</h1>
        </div>
        @include('layouts.breadcrumb')

        <div id="cart_main" class="container">
            <div class="row order-refresh" id="cart-products-row" data-replace-html="">
                <div class="col-md-12 no-products-cart">Успешно изпратено съобщение, очаквайте отговор.
                    <br>
                    <a class="site-btn btn btn-lg btn-filled site-color" href="/">
                        Върнете се в сайта
                    </a>
                </div>
            </div>
        </div>
        </div>
    </main>

@endsection
