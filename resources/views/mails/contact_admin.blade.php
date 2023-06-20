
{{ $request->get('email') }}
<h2>Изпратен имейл от клиент {{ $request->get('username') }}</h2>
</br><h3>Клиентска информация</h3>
<table>
    <tr>
        <td>
            <span>Имена на клиента: </span>
        </td>
        <td>{{ $request->get('username') }}</td>
    </tr>
    
    <tr>
        <td>
            <span>Имейл на клиента: </span>
        </td>
        <td>{{ $request->get('email') }}</td>
    </tr>
    
    <tr>
        <td>
            <span>Относно: </span>
        </td>
        <td>{{ $request->get('subject') }}</td>
    </tr>
    
    <tr>
        <td>
            <span>Съобщение: </span>
        </td>
        <td>{{ $request->get('msg') }}</td>
    </tr>
</table>