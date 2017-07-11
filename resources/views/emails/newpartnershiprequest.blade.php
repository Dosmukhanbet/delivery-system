@component('mail::message')
Уважаемый Админ!<br>
Поступил запрос на партнерство <br><br>

Имя:{{$data['name']}}<br>
Название компании:{{$data['company_name']}}<br>
Мобильный номер:{{$data['mobilenumber']}}<br>


{{-- @component('mail::button', ['url' => 'orders'])
Перейти
@endcomponent --}}

с уваженеим,<br>
{{ config('app.name') }}
@endcomponent
