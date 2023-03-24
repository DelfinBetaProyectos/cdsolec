<x-web-layout title="Compra">
	@section('background', asset('img/slide1.jpg'))

	@section('content')
		<div class="container mx-auto px-6">
			<h6 class="text-sm uppercase font-semibold tracking-widest text-blue-800">
				Detalle de su compra
			</h6>
			<h2 class="text-3xl leading-tight font-bold mt-4">Pedido {{ $propal->ref }}</h2>

			<div class="mx-4 mt-5 text-sm text-red-800 p-2 rounded bg-red-300 border border-red-800 {{ ($errors->any()) ? 'block' : 'hidden' }}">
				<x-jet-validation-errors class="mb-4" />
			</div>
			
			<div class="w-full py-3 mb-3" id="table">
				<table class="my-2 w-full rounded-lg overflow-hidden bg-white border-collapse border border-green-800">
					<thead class="border bg-gray-300">
						<tr class="hidden lg:table-row text-sm leading-4 tracking-wider">
							<th class="px-3 py-4 border-2 text-left">Producto</th>
							<th class="px-3 py-4 border-2 text-center" style="width: 100px">Cantidad</th>
							<th class="px-3 py-4 border-2 text-center" style="width: 200px">Precio</th>
							<th class="px-3 py-4 border-2 text-center" style="width: 220px">Sub-Total</th>
						</tr>
					</thead>
					<tbody class="w-full flex-1 sm:flex-none bg-white divide-y divide-gray-400 text-sm leading-5">
						@foreach($propal->propal_detail as $item)
							@php
								$price_bs = $item->price * $propal->multicurrency_tx;
								$subtotal_bs = $item->total_ht * $propal->multicurrency_tx;
							@endphp
							<tr class="flex flex-col lg:table-row even:bg-gray-300">
								<td class="flex flex-row lg:table-cell border-2">
									<div class="w-32 md:w-40 px-3 py-2 lg:py-4 bg-gray-500 text-white text-xs leading-4 font-medium uppercase tracking-wider table-row lg:hidden">
										Producto
									</div>                         
									<div class="px-3 py-2 lg:py-4 flex items-center">
										<div class="flex-shrink-0 h-10 w-10 mr-4">
											<img class="h-10 w-10 rounded-full" src="../img/favicon/apple-icon.png" alt="{{ $propal->label }}" title="{{ $propal->label }}" />
										</div>
										<div class="leading-5">
											<p class="text-sm text-cdsolec-blue-light font-bold">{{ $item->description }}</p>
											<p>Ref: {{ $propal->label }}</p>
										</div>
									</div>
								</td>
								<td class="flex flex-row lg:table-cell border-2 text-center">
									<div class="w-32 md:w-40 px-3 py-2 lg:py-4 bg-gray-500 text-white text-xs leading-4 font-medium uppercase tracking-wider table-row lg:hidden">
										Cantidad
									</div>                    
									<div class="px-3 py-2 lg:py-4 text-right">             
										{{ $item->qty }}
									</div>
								</td>
								<td class="flex flex-row lg:table-cell border-2 text-center">
									<div class="w-32 md:w-40 px-3 py-2 lg:py-4 bg-gray-500 text-white text-xs leading-4 font-medium uppercase tracking-wider table-row lg:hidden">
										Precio
									</div>
									<div class="px-3 py-2 lg:py-4 lg:text-right">
										<p>Bs {{ number_format($price_bs, 2, ',', '.') }}</p>
										<p>$USD {{ number_format($item->price, 2, ',', '.') }}</p>
									</div>
								</td>
								<td class="flex flex-row lg:table-cell border-2 text-center">
									<div class="w-32 md:w-40 px-3 py-2 lg:py-4 bg-gray-500 text-white text-xs leading-4 font-medium uppercase tracking-wider table-row lg:hidden">
										Sub-Total
									</div>
									<div class="px-3 py-2 lg:py-4 lg:text-right">
										<p>
											Bs 
											<span id="subtotal_bs_{{ $item['id'] }}">
												{{ number_format($subtotal_bs, 2, ',', '.') }}
											</span>
										</p>
										<p>
											$USD 
											<span id="subtotal_usd_{{ $item['id'] }}">
												{{ number_format($item->total_ht, 2, ',', '.') }}
											</span>
										</p>
									</div>
								</td>
							</tr>
						@endforeach
						@php
							$total_bs = $propal->total_ht * $propal->multicurrency_tx;
						@endphp
						<tr class="flex flex-col lg:table-row bg-gray-300">
							<td colspan="3" class="flex flex-row lg:table-cell border-2">
								<div class="w-32 md:w-40 px-3 py-2 bg-gray-500 text-white text-xs leading-4 font-bold uppercase tracking-wider table-row lg:hidden">
									SubTotal
								</div>
								<div class="px-3 py-2 lg:text-right font-bold">
									SubTotal
								</div>
							</td>
							<td class="flex flex-row lg:table-cell border-2">
								<div class="w-32 md:w-40 px-3 py-2 bg-gray-500 text-white text-xs leading-4 font-bold uppercase tracking-wider table-row lg:hidden">
									SubTotal
								</div>
								<div class="px-3 py-2 lg:text-right font-bold">
									<p>
										Bs 
										<span id="subtotal_bs">
											{{ number_format($total_bs, 2, ',', '.') }}
										</span>
									</p>
									<p>
										$USD 
										<span id="subtotal_usd">
											{{ number_format($propal->total_ht, 2, ',', '.') }}
										</span>
									</p>
								</div>
							</td>
						</tr>
						@php
							$iva_bs = $propal->tva * $propal->multicurrency_tx;
						@endphp
						<tr class="flex flex-col lg:table-row bg-gray-300">
							<td colspan="3" class="flex flex-row lg:table-cell border-2">
								<div class="w-32 md:w-40 px-3 py-2 bg-gray-500 text-white text-xs leading-4 font-bold uppercase tracking-wider table-row lg:hidden">
									IVA
								</div>
								<div class="px-3 py-2 lg:text-right font-bold">
									IVA
								</div>
							</td>
							<td class="flex flex-row lg:table-cell border-2">
								<div class="w-32 md:w-40 px-3 py-2 bg-gray-500 text-white text-xs leading-4 font-bold uppercase tracking-wider table-row lg:hidden">
									IVA
								</div>
								<div class="px-3 py-2 lg:text-right font-bold">
									<p>
										Bs 
										<span id="iva_bs">
											{{ number_format($iva_bs, 2, ',', '.') }}
										</span>
									</p>
									<p>
										$USD 
										<span id="iva_usd">
											{{ number_format($propal->tva, 2, ',', '.') }}
										</span>
									</p>
								</div>
							</td>
						</tr>
						@php
							$total_bs = $total_bs + $iva_bs;
						@endphp
						<tr class="flex flex-col lg:table-row bg-gray-300">
							<td colspan="3" class="flex flex-row lg:table-cell border-2">
								<div class="w-32 md:w-40 px-3 py-2 bg-gray-500 text-white text-xs leading-4 font-bold uppercase tracking-wider table-row lg:hidden">
									Total
								</div>
								<div class="px-3 py-2 lg:text-right font-bold">
									Total
								</div>
							</td>
							<td class="flex flex-row lg:table-cell border-2">
								<div class="w-32 md:w-40 px-3 py-2 bg-gray-500 text-white text-xs leading-4 font-bold uppercase tracking-wider table-row lg:hidden">
									Total
								</div>
								<div class="px-3 py-2 lg:text-right font-bold">
									<p>
										Bs 
										<span id="total_bs">
											{{ number_format($total_bs, 2, ',', '.') }}
										</span>
									</p>
									<p>
										$USD 
										<span id="total_usd">
											{{ number_format($propal->total, 2, ',', '.') }}
										</span>
									</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	@endsection
</x-web-layout>