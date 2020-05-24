@component('mail::message')
# Thanks for your support

Вот реквизиты марафона.

<strong>Marathon Name</strong> {{ $data['marathon']}}
<strong>Name</strong> {{$data['name']}}
@endcomponent
