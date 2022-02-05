<table>
    <thead>
    <tr>
        <th style="font-weight: bold;font-size: 9px;width: auto;">{{ __('main.id') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 11px;">{{ __('main.name') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 11px;">{{ __('main.birthdate') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 11px;">{{ __('front.residence_country') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 13px;">{{ __('main.email') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 14px;">{{ __('main.phone') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 13px;">{{ __('main.date') }}</th>
        <th style="font-weight: bold;font-size: 9px;width: 13px;">{{ __('main.role') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <?php 
            $color = $user->calling_code == '+90' ? '#ea8181' : '';
        ?>
        <tr>
            <td style="background: {{ $color }}">{{ $user->id }}</td>
            <td style="background: {{ $color }}">{{ $user->name }}</td>
            <td style="background: {{ $color }}">{{ $user->birthdate }}</td>
            <td style="background: {{ $color }}">{{ $user->country }}</td>
            <td style="background: {{ $color }}">{{ $user->email }}</td>
            <td style="background: {{ $color }}">{{ $user->phone }}</td>
            <td style="background: {{ $color }}">{{ $user->created_at->format('d/m/Y') }}</td>
            <td style="background: {{ $color }}">{{ $user->roles->first()->name ?? __('main.user') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
