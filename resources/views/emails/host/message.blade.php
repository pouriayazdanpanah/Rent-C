@component('mail::message')
Hi {{$hostName}} Dear


You have a message from {{$userName}}

{{$message}}

@component('mail::button', ['url' => "tel:$phone"])
Customer Phone
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
