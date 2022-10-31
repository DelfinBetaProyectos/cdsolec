<x-web-layout title="Producto">
	@section('background', asset('img/slide1.jpg'))

	@section('content')
    <div class="container mx-auto px-6">
			<nav class="mb-4">
				<ol class="flex flex-wrap text-cdsolec-blue-light font-semibold text-xl">
					<li>
						<a href="{{ route('welcome') }}">Inicio</a><span class="mx-2">/</span>
					</li>
					<li>
						<a href="{{ route('products') }}">Productos</a><span class="mx-2">/</span>
					</li>
					<li class="uppercase font-semibold tracking-widest">
						Detalle del Producto
					</li>
				</ol>
			</nav>

			<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
				<div>
					<div class="mb-3 border border-cdsolec-green-dark overflow-hidden rounded-lg flex justify-center content-center">
						<img src="{{ asset($image) }}" alt="{{ $product->label }}" title="{{ $product->label }}" class="h-60 w-60" />
					</div>
					@if ($product->documents->isNotEmpty())
						<div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
							@foreach ($product->documents as $document)
								@if (pathinfo($document->filename, PATHINFO_EXTENSION) == 'jpg')
									<div class="rounded-lg border border-cdsolec-green-dark">
										<img src="{{ asset('storage/produit/'.$product->ref.'/'.$document->filename) }}" alt="{{ $product->label }}" title="{{ $product->label }}" />
									</div>
								@endif
							@endforeach
						</div>
					@endif
				</div>
				<div>
					<h6 class="text-cdsolec-green-dark font-semibold text-lg py-1">{{ $product->label }}</h6>
					<p class="uppercase font-semibold tracking-widest">Ref: {{ $product->ref }}</p>
					<p><strong>Descripción</strong></p>
					{!! $product->description !!}
					@if ($datasheet)
						<p>
							<a href="{{ $datasheet }}" target="_blank">
								<img class="h-5 w-5 inline" src="{{ asset('img/pdf.png') }}" alt="Datasheet" title="Datasheet" /> Descargar Datasheet
							</a>
						</p>
					@endif
				</div>
				<div>
					<div class="flex flex-col lg:flex-row justify-between">
						<div class="flex p-1">
							<button type="button" class="px-3 py-2 my-1 border border-gray-500 font-semibold">+</button>
							<input type="text" id="cantidad" name="cantidad" value="1" class="w-20 my-1 text-right" />
							<button type="button" class="px-5 py-2 my-1 border border-gray-500 font-semibold">-</button>
						</div>
						<div class="m-2">
							<button type="button" class="p-3 font-semibold bg-cdsolec-green-dark text-white uppercase text-xs">
								Agregar al Carrito <i class="fas fa-shopping-cart"></i>
							</button>
						</div>
					</div>
					<table class="w-full mb-5 text-sm">
						<tr>
							<td>Precio</td>
							<td class="p-1 text-right">${{ number_format($product->prices[0]->price, 2, ',', '.') }}</td>
						</tr>
						<tr>
							<td>Total</td>
							<td class="text-right text-cdsolec-green-dark font-semibold">${{ number_format($product->prices[0]->price, 2, ',', '.') }}</td>
						</tr>
					</table>
					<strong>Precio</strong>
					<table class="w-full pb-3 border-collapse border border-gray-300 text-sm">
						<tr>
							<td class="p-2"><strong>Cantidad</strong></td>
							<td class="p-2 text-right"><strong>Precio</strong></td>
						</tr>
						<tr class="bg-gray-300 border border-gray-300">
							<td class="p-2">1</td>
							<td class="p-2 text-right text-cdsolec-green-dark font-semibold">$1.100</td>
						</tr>
						<tr class="border border-gray-300">
							<td class="p-2">3</td>
							<td class="p-2 text-right">$1.050</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	@endsection
</x-web-layout>