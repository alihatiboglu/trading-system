<table>
    <thead>
    <tr>
        <th style="font-weight: bold;font-size: 9px;width: 13px;">{{ __('main.name') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 13px;">{{ __('main.nickname') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 13px;">{{ __('main.phone') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 13px;">{{ __('main.course') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->name }}</td>
            <td>{{ $order->nickname }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->course->name ?? '' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
