@component('mail::message')
Уважаемый Админ!<br>
На сайте zakaz.express опубликована новая заявка. <br><br>

<strong>Продавец </strong><br>
{{$order->shop->name}}<br><br>

<strong>Заказ</strong><br>
ID# -{{$order->id}}<br>
ДАТА/Время создания - {{$order->created_at}}<br><br>

<strong>Клиент</strong><br>
ИМЯ - {{ $order->user->name}}<br>
Мобильный - {{ $order->user->mobile_number}}<br>
Адрес доставки = {{$order->delivery_address}}<br>

{{-- @component('mail::button', ['url' => 'orders'])
Перейти
@endcomponent --}}

с уваженеим,<br>
{{ config('app.name') }}
@endcomponent
