@component('mail::message')

Gracias por comprar nuestro producto. 
**Tu número de pedido es: {{ $order->id }}**

## Resumen de tu pedido:

Recibirás una actualización cuando tu pedido sea enviado. Si tienes alguna pregunta, no dudes en contactarnos.

@component('mail::button', ['url' => $url, 'color' => 'primary'])
Ver Pedido
@endcomponent

Gracias por tu preferencia,<br>
{{ config('app.name') }}

@component('mail::subcopy')
¿Necesitas ayuda? [Centro de Ayuda]({{ url('/help') }}) | [Términos y Condiciones]({{ url('/terms') }}) | [Política de Privacidad]({{ url('/privacy') }})
@endcomponent
@endcomponent