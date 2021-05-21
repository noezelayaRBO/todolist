@component('mail::message')

#Thank for your message

<strong>Name</strong> {{ $data['name'] }} <br>
<strong>Email</strong> {{ $data['email'] }}

<strong>Message</strong> 
{{ $data['message'] }}

@endcomponent
