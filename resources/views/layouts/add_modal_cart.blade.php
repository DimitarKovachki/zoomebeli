<div class="modal-dialog top" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="modal-header">
            <h5 class="modal-title">ПРОДУКТЪТ Е ДОБАВЕН УСПЕШНО В КОЛИЧКАТА</h5>
        </div>
        <div class="add-product-wrapper">
            <div class="container-fluid">
                <div class="row mt25">
                    <div class="col-12">
                        <table class="cart-table-products">
                            <thead>
                                <tr>
                                    <th>Вие добавихте</th>
                                    <th>Ед. цена</th>
                                    <th>Тегло</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="rows-products-cart  clearfix">
                                    <td class="first-cell-cart-table">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="4" class="img-product-cart">
                                                        <a href="/products/{{ $cartItem->product->id }}">
                                                            <img src="{{ $cartItem->product->images->first()->image }}"
                                                                alt="Elisabetta Franchi 1">
                                                        </a>
                                                    </td>
                                                    <td class="font-Um">{{ $cartItem->product->title }}</td>
                                                </tr>
                                                @if (!$cartItem->options->isEmpty())
                                                    @foreach ($cartItem->options as $k => $option)
                                                        <tr>
                                                            <td>{{ $option->attribute->name }}: <span
                                                                    class="font-Ub">{{ $option->name }}</span></td>
                                                        </tr>
                                                    @endforeach
                                                @else

                                                @endif
                                                <tr>
                                                    <td>
                                                        <p>Размер:</p>
                                                        <span class="cart-table-size">
                                                            {{ $cartItem->size }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="table-cell-unit-price">
                                        <span>Ед. цена :</span>
                                        <span
                                            class="font-Um">{{ currency($cartItem->product_variation->price()) }}</span>
                                    </td>
                                    <td class="table-cell-weight">
                                        <span>Тегло : </span>
                                        <span>{{ $cartItem->product_variation->weight }} кг.</span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="reserv-product-btm">
                            <a href="/#category"  class="btn-modal site-color-o">ПАЗАРУВАЙ
                                ОЩЕ</a>
                            <a href="/checkout" class="btn-modal site-color">ВИЖ КОЛИЧКАТА</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
