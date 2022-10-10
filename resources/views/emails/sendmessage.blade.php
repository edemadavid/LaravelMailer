@component('mail::message')



# {{$messageId->subject}}


    {{$messageId->body}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }} 
@endcomponent




