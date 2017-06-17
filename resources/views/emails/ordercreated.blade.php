@component('mail::message')
Новая заявка была создана<br>
ID#-{{$order->id}}<br>
ДАТА/Время создания - {{$order->created_at}}<br>
ИМЯ Покупателя - {{ $order->user->name}}<br>
Мобильный - {{ $order->user->mobile_number}}<br>
Адрес доставки = {{$order->delivery_address}}<br>

{{-- @component('mail::button', ['url' => 'orders'])
Перейти
@endcomponent --}}

с уваженеим,<br>
{{ config('app.name') }}
@endcomponent
