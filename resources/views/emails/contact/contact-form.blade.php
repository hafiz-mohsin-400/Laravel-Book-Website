@component('mail::message')
# Hi 

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('http://americanbooks.test/') }}
@endcomponent
