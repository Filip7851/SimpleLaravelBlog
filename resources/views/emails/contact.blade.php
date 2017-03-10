@component('mail::message')
# New Message

<strong>{{ $name }}</strong> contacted you on Clean Blog.<br>
{{ $name }}'s contact number: <strong>{{ $phone_number }}</strong>

{{ $name }} wrote:

@component('mail::panel')
{!! $message !!}
@endcomponent

@endcomponent
