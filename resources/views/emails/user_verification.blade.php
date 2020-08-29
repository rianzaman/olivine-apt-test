@component('mail::message')
# Dear user,

Please click the button bellow to verify your email.

@component('mail::button', ['url' => env("APP_URL").'email/verification/'.$user->id.'/'.$user->verification_token])
Click to verify
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
