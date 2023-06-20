<h2>Здравейте, {{ $order->client_name }} вие успешно направихте поръчка с № {{ $order->id }}</h2>
</br><h3>Клиентска информация</h3></br>
<table class="checkout-email" style="border-collapse: separate;border-spacing: 0;border-style: solid;margin-bottom: 24px;width: 60%;">
    <colgroup>
        <col span="1" style="width: 30%;">
        <col span="1" style="width: 70%;">
    </colgroup>
    <tbody>
        <tr>
            <td>
                <span>Имена на клиента: </span>
            </td>
            <td>
                <span>{{ $order->client_name }}</span>
            </td>
        </tr>
        <tr>
            <td>Град: </td>
            <td>
                {{ $order->city }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Метод на доставка: </span>
            </td>
            <td>
                <span>
                    @if($order->to_office == 1)
                        {{'До офис'}}
                    @else
                         {{'До адрес'}}
                    @endif
                </span>
            </td>
        </tr>
        <tr>

            <td>До адрес: </td>
            <td>
                <span>
                    @if($order->to_office == 0)
                        {{$order->personal_address}}
                        @else
                        {{$order->office_address}}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <td>Телефон: </td>
            <td>
                <span>{{$order->phone}}</span>
            </td>
        </tr>
        
        <tr>
            <td>Имейл: </td>
            <td>
                <span>{{$order->email}}</span>
            </td>
        </tr>
        <tr>
            <td>Бележка: </td>
            <td>
                <span>
                    @if($order->note != null)
                         {{$order->note}}
                    @else
                        {{'Няма'}}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <td>Цена на доставка: </td>
            <td>
                <span>{{ currency($order->shipping_cost) }}</span>
            </td>
        </tr>
        <tr>
            <td>Крайна цена: </td>
            <td>
                <span>{{ currency($order->total) }}</span>
            </td>
        </tr>
    </tbody>
</table>


<h3>Вашата поръчка</h3>
@foreach ($items as $item)
    <table class="checkout-email" style="border-collapse: separate;border-spacing: 0;border-style: solid;margin-bottom: 24px;width: 60%;">
        <colgroup>
            <col span="1" style="width: 30%;">
            <col span="1" style="width: 70%;">
        </colgroup>
        <tbody>
            <tr>
                <td>
                    <span>Име на продукта: </span>
                </td>
                <td>
                    <span>{{ $item->product->title }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Размер: </span>
                </td>
                <td>
                    <span>{{ $item->size }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Бележка към продукта: </span>
                </td>
                <td>
                    @if($item->note != null)
                        <span>{{ $item->note }}</span>
                    @else
                        {{'Няма'}}
                    @endif
                </td>
            </tr>

            @foreach ($item->options  as $option)
            <tr>
                <td>
                    <span>{{ $option->attribute->name }}: </span>
                </td>
                <td>
                    <span>{{ $option->name }}</span>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    <span>Цена: </span>
                </td>
                <td>
                    <span>
                        {{ currency($item->product_variation->current_price) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Тегло: </span>
                </td>
                <td>
                    <span>
                        {{ $item->product_variation->weight }} кг.
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
@endforeach
<h3>За връзка с нас</h3>
<p>
    <a href="mailto: zoomebeli@gmail.com">
        <span>zoomebeli@gmail.com</span>
    </a>
</p>
<p>
    <a href="http://www.zoomebeli.bg/contact">За контакти</a>
</p>

<p>Телефон: 0879 14 14 33</p>