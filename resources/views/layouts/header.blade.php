<header>
    <nav class="navbar navbar-expand-md fixed-top">
        <!-- Just an image -->
        <a class="navbar-brand" href="/">
            <img src="/img/logo/logo-mitaka.png" width="50" height="50" alt="">
            <p>Z<span>oo</span>Mebeli</p>
        </a>
        
        <div id="js-top_mini_cart" class="cart-header mt-2 mt-md-0">
            @include('cart.top-mini-cart',['cart'=>$cart])
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Начало <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Продукти
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/category/dog">Мебели за кучета</a>
                        <a class="dropdown-item" href="/category/cat">Мебели за котки</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/products">Всички продукти</a>
                        <a class="dropdown-item " href="/custom-furniture">Поръчкови</a>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/gallery">Галерия</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="/about">За нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Контакти</a>
                </li>
            </ul>

        
        </div>
     

        {{-- @include('cart.cart') --}}
    </nav>
</header>
