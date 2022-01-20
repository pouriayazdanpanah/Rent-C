@component('mail::message')
New device singed in to your account


Your Account was just signed in to from device with ip <p class="text-bold">{{$userIp}}</p>


For more information go to you Activity
@component('mail::button', ['color'=>'green','url' => url('/profile/security')])
Show Activity
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
