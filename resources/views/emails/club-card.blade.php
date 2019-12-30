@component('mail::message')
# Hello {{$user->name}},
<br>

This will eventually include the discount card

Thanks,<br>
{{ config('app.name') }}
@endcomponent