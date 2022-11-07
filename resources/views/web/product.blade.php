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
						<img src="{{ asset($image) }}" alt="{{ $product->label }}" title="{{ $product->label }}" class="h-60 w-60 rounded-lg" />
					</div>
					@if ($product->documents->isNotEmpty())
						<div class="grid grid-cols-1 lg:grid-cols-4 gap-2">
							@foreach ($product->documents as $document)
								@php
									if (app()->environment('production')) {
										$image = '/storage/produit/'.$product->ref.'/'.$document->filename;
									} else {
										$image = '/img/favicon/apple-icon.png';
									}
								@endphp
								@if (pathinfo($document->filename, PATHINFO_EXTENSION) == 'jpg')
									<div class="rounded-lg border border-cdsolec-green-dark">
										<img src="{{ asset($image) }}" alt="{{ $product->label }}" title="{{ $product->label }}" class="rounded-lg" />
									</div>
								@endif
							@endforeach
						</div>
					@endif
				</div>
				<div>
					<h2 class="text-cdsolec-green-dark font-semibold text-lg py-1">{{ $product->label }}</h2>
					<h3 class="uppercase font-semibold tracking-widest">Ref: {{ $product->ref }}</h3>
					<h4 class="font-bold">Descripción</h4>
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
					<p><strong>Precio</strong></p>
					<table class="w-full pb-3 border-collapse border border-gray-300 text-sm">
						<thead>
							<tr>
								<th class="p-2 text-left">Moneda</th>
								<th class="p-2 text-right">Cant.</th>
								<th class="p-2 text-right">Precio</th>
								<th class="p-2 text-right">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<tr class="bg-gray-300 border border-gray-300">
								<td class="p-2 text-left">Bs</td>
								<td class="p-2 text-right">{{ $quantity = 1 }}</td>
								<td class="p-2 text-right">
									{{ number_format(($product->prices[0]->price * $tasa_usd), 2, ',', '.') }}
								</td>
								<td class="p-2 text-right text-cdsolec-green-dark font-semibold">
									{{ number_format(($product->prices[0]->price * $tasa_usd * $quantity), 2, ',', '.') }}
								</td>
							</tr>
							<tr class="border border-gray-300">
								<td class="p-2 text-left">$USD</td>
								<td class="p-2 text-right">{{ $quantity = 1 }}</td>
								<td class="p-2 text-right">
									{{ number_format($product->prices[0]->price, 2, ',', '.') }}
								</td>
								<td class="p-2 text-right text-cdsolec-green-dark font-semibold">
									{{ number_format(($product->prices[0]->price * $quantity), 2, ',', '.') }}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="lg:col-span-2">
					<p><strong>Especificaciones del Producto:</strong></p>
					<table class="w-full pb-3 border-collapse border border-gray-300 text-sm">
						<thead>
							<tr class="bg-gray-300">
								<th class="p-2 text-left">Atributo</th>
								<th class="p-2 text-left">Valor</th>
								<th class="p-2 text-center" style="width: 60px">Buscar</th>
							</tr>
						</thead>
						@if ($extrafields->isNotEmpty())
							@php
								$product_fields = $product->extrafields->toArray();
							@endphp
							<tbody>
								@foreach ($extrafields as $extrafield)
									@if ($product_fields[$extrafield->name] != 'N/A')
										<tr class="even:bg-gray-300">
											<td class="p-2 text-left">{{ $attributes[$extrafield->name] }}</td>
											<td class="p-2 text-left">{{ $product_fields[$extrafield->name] }}</td>
											<td class="p-2 text-center">
												<label for="field_{{ $extrafield->name }}" class="flex justify-center items-center">
													<x-jet-checkbox id="field_{{ $extrafield->name }}" name="fields[]" />
												</label>
											</td>
										</tr>
									@endif
								@endforeach
								<tr>
									<td colspan="3" class="p-2 text-center">
										<button type="button" class="p-3 font-semibold bg-cdsolec-green-dark text-white uppercase text-xs">
											Buscar <i class="fas fa-search"></i>
										</button>
									</td>
								</tr>
							</tbody>
						@endif
					</table>
				</div>
			</div>
		</div>
	@endsection
</x-web-layout>