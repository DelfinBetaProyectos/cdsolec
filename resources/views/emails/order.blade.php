@component('mail::message')
# Compra {{ $propal->ref }}

Hemos recibido su compra con los siguientes datos:

@component('mail::table')
| Producto | Cantidad | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Precio | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subtotal |
| -------- | --------:| -------------------------:| -------------------------:|
@foreach($propal->propal_detail as $item)
@php
$price_bs = $item->price * $propal->multicurrency_tx;
$subtotal_bs = $item->total_ht * $propal->multicurrency_tx;
@endphp
| {{ $item->description }}<br />Ref: {{ $item->label }} | {{ $item->qty }} | Bs {{ number_format($price_bs, 2, ',', '.') }}<br />$USD {{ number_format($item->price, 2, ',', '.') }} | Bs {{ number_format($subtotal_bs, 2, ',', '.') }}<br />$USD {{ number_format($item->total_ht, 2, ',', '.') }} |
@endforeach
@php
$total_bs = $propal->total_ht * $propal->multicurrency_tx;
@endphp
|          |          |                  Subtotal | Bs {{ number_format($total_bs, 2, ',', '.') }}<br />$USD {{ number_format($propal->total_ht, 2, ',', '.') }} |
@php
$iva_bs = $propal->tva * $propal->multicurrency_tx;
@endphp
|          |          |                       IVA | Bs {{ number_format($iva_bs, 2, ',', '.') }}<br />$USD {{ number_format($propal->tva, 2, ',', '.') }} |
@php
$total_bs = $total_bs + $iva_bs;
@endphp
|          |          |                 **Total** | **Bs {{ number_format($total_bs, 2, ',', '.') }}<br />$USD {{ number_format($propal->total, 2, ',', '.') }}** |
@endcomponent

**{{ config('app.name') }}**
@endcomponent
