<h1>Номер на поръчката: №{{ $order->id }} </h1>
<h1>Данни за потребителя </h1>
<table class="checkout-email" style="border-collapse: separate;border-spacing: 0;border-style: solid;margin-bottom: 24px;width: 60%;">
    <tbody>
        <tr>
            <td>
                <span>Имена на клиента</span>
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

            <td>Адрес на {{ $order->to_office == 0 ? 'клиента' : 'офиса' }}: </td>
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
            <td>Имейл: </td>
            <td>
                <span>{{$order->email}}</span>
            </td>
        </tr>
        <tr>
            <td>Телефон: </td>
            <td>
                <span>{{$order->phone}}</span>
            </td>
        </tr>
        <tr>
            <td>Крайна цена: </td>
            <td>
                <span>{{ currency($order->total) }}</span>
            </td>
        </tr>
        <tr>
            <td>Цена на доставка: </td>
            <td>
                <span>{{ currency($order->shipping_cost) }}</span>
            </td>
        </tr>
        <tr>
            <td>Бележка</td>
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

    </tbody>
</table>


@foreach ($items as $item)
<h1>Данни за продуктите</h1>
    <table class="checkout-email" style="border-collapse: separate;border-spacing: 0;border-style: solid;margin-bottom: 24px;width: 60%;">
        <tbody>
            <tr>
                <td>
                    <span>Име на продукта</span>
                </td>
                <td>
                    <span>{{ $item->product->title }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Продукт ID</span>
                </td>
                <td>
                    <span>{{ $item->product->id }}</span>
                </td>
            </tr>
            
            <tr>
                <td>
                    <span>Размер</span>
                </td>
                <td>
                    <span>{{ $item->size }}</span>
                </td>
            </tr>
            
            
            <tr>
                <td>
                    <span>Бележка</span>
                </td>
                    @if($item->note != null)
                        <span>{{ $item->note }}</span>
                    @else
                        {{'Няма'}}
                    @endif
                <td>
                </td>
            </tr>

            @foreach ($item->options  as $option)
            <tr>
                <td>
                    <span>{{ $option->attribute->name }}</span>
                </td>
                <td>
                    <span>{{ $option->name }}</span>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    <span>Цена</span>
                </td>
                <td>
                    <span>
                        {{ currency($item->product_variation->current_price) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Тегло</span>
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
