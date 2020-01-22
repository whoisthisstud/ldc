@component('mail::message')
# Hey Guys,
<br>

**Name**: {{ $contact->name }}

**Email**: {{ $contact->email }}

**Message**: {{ $contact->message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent