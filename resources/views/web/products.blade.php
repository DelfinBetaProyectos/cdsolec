<x-web-layout title="Productos">
	@section('background', asset('img/slide1.jpg'))

	@section('content')
    <div class="container mx-auto px-6">
			<nav class="mb-2">
				<ol class="flex flex-wrap text-cdsolec-blue-light font-semibold text-xl">
					<li>
						<a href="{{ route('welcome') }}">Inicio</a><span class="mx-2">/</span>
					</li>
					<li>
						<a href="{{ route('products') }}">Productos</a><span class="mx-2">/</span>
					</li>
				</ol>
			</nav>

			@if ($category)
				<nav class="my-2">
					<ol class="flex flex-wrap text-cdsolec-green-dark font-semibold text-xl">
						<li>
							<a href="{{ route('products') }}?category={{ $parent['id'] }}">{{ $parent['label'] }}</a><span class="mx-2">/</span>
						</li>
						<li>
							<a href="{{ route('products') }}?category={{ $category['id'] }}">{{ $category['label'] }}</a><span class="mx-2">/</span>
						</li>
					</ol>
				</nav>

				@if (count($category['childs']) > 0)
					{{-- <div class="my-2 p-2 rounded-lg bg-gray-300 h-64 overflow-x-auto flex flex-col flex-wrap">
						@foreach($category->childs as $child)
							<div class="m-2 p-2 bg-white shadow-md">
								<a href="{{ route('products').'?category='.$child->id }}" class="block">
									<div class="flex flex-wrap">
										<img class="h-10 w-10" src="{{ asset('img/p1.jpg') }}" alt="Producto" title="Porducto" />
										<div class="ml-1 flex-1">
											<h4 class="text-cdsolec-blue-light font-bold">{{ $child->label }}</h4>
											<p class="text-xs">(350 Resultados)</p>
										</div>
									</div>
								</a>
							</div>
						@endforeach
					</div> --}}
					<div class="my-2 p-2 rounded-lg bg-gray-300 h-64 overflow-x-auto flex flex-col flex-wrap">
						@foreach($category['childs'] as $child)
							<div class="m-2 p-2 bg-white shadow-md">
								<a href="{{ route('products').'?category='.$child['id'] }}" class="block">
									<h4 class="text-cdsolec-blue-light font-bold">{{ $child['label'] }}</h4>
									<p class="text-xs">(350 Resultados)</p>
								</a>
							</div>
						@endforeach
					</div>
				@endif
			@endif

			<div class="mt-3 grid gap-4 grid-cols-1 md:grid-cols-4 lg:grid-cols-5">
      	<div class="relative">
      		<div class="flex mb-3">
      			<form method="GET" action="{{ route('products') }}" class="w-full">
              @csrf
              <label for="search" class="sr-only">Buscar</label>
              <div class="relative rounded-md shadow-sm">
                <input type="text" name="search" id="search2" class="block w-full pl-2 pr-12 text-sm rounded-md border border-cdsolec-green-dark focus:ring-gray-300 focus:border-gray-300" placeholder="Buscar" />
                <div class="absolute inset-y-0 right-0 flex items-center">
                  <button type="submit" class="px-3 py-2 bg-cdsolec-green-dark rounded-r-md text-center text-white font-semibold uppercase tracking-wider hover:bg-cdsolec-green-light">
                    <i class="fas fa-fw fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
      		</div>
      		<div class="accordion">
		        <div class="tab w-full overflow-hidden border-t mb-3 rounded-md shadow-md">
		          <input type="checkbox" id="tab-one" name="filters" class="absolute opacity-0" {{ (($category == null) || ($category['fk_parent'] == '715') || ($parent['fk_parent'] == '715')) ? 'checked' : '' }} />
							<label class="block p-2 cursor-pointer bg-gray-300 text-cdsolec-blue-light" for="tab-one">Categorías</label>
							<div class="tab-content overflow-hidden bg-gray-100">
								@if ($categories)
									<ul class="text-cdsolec-blue-light">
										@foreach($categories as $item)
											@php
												$bg = '';
												if (($category != null) && ($item['id'] == $category['id'])) {
													$bg = 'bg-cdsolec-green-light';
												}
												if (($parent != null) && ($item['id'] == $parent['id'])) {
													$bg = 'bg-cdsolec-green-light';
												}
											@endphp
											<li>
												<a class="px-2 py-1 block hover:bg-cdsolec-green-light {{ $bg }}" href="{{ route('products') }}?category={{ $item['id'] }}">
													{{ $item['label'] }}
												</a>
												@if (($category != null) && ($item['id'] == $category['id']))
													@if (count($category['childs']) > 0)
														<ul class="ml-2">
															@foreach($category['childs'] as $child)
																<li>
																	<a href="{{ route('products') }}?category={{ $child['id'] }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child['id'] == $category['id']) ? 'bg-cdsolec-green-light' : '' }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child['label'] }}
																	</a>
																</li>
															@endforeach
														</ul>
													@endif
												@endif
												@if (($parent != null) && ($item['id'] == $parent['id']))
													@if (count($parent['childs']) > 0)
														<ul class="ml-2">
															@foreach($parent['childs'] as $child)
																<li>
																	<a href="{{ route('products') }}?category={{ $child['id'] }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child['id'] == $category['id']) ? 'bg-cdsolec-green-light' : '' }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child['label'] }}
																	</a>
																</li>
															@endforeach
														</ul>
													@endif
												@endif
											</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>
		        <div class="tab w-full overflow-hidden border-t mb-3 rounded-md shadow-md">
		          <input type="checkbox" id="tab-two" name="filters" class="absolute opacity-0" {{ (($category == null) || ($category['fk_parent'] == '693') || ($parent['fk_parent'] == '693')) ? 'checked' : '' }} />
							<label class="block p-2 cursor-pointer bg-gray-300 text-cdsolec-blue-light" for="tab-two">Sectores de Interés</label>
							<div class="tab-content overflow-hidden bg-gray-100">
								@if ($sectors)
									<ul class="text-cdsolec-blue-light">
										@foreach($sectors as $item)
											@php
												$bg = '';
												if (($category != null) && ($item['id'] == $category['id'])) {
													$bg = 'bg-cdsolec-green-light';
												}
												if (($parent != null) && ($item['id'] == $parent['id'])) {
													$bg = 'bg-cdsolec-green-light';
												}
											@endphp
											<li>
												<a href="{{ route('products') }}?category={{ $item['id'] }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ $bg }}">
													{{ $item['label'] }}
												</a>
												@if (($category != null) && ($item['id'] == $category['id']))
													@if (count($category['childs']) > 0)
														<ul class="ml-2">
															@foreach($category['childs'] as $child)
																<li>
																	<a href="{{ route('products') }}?category={{ $child['id'] }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child['id'] == $category['id']) ? 'bg-cdsolec-green-light' : '' }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child['label'] }}
																	</a>
																</li>
															@endforeach
														</ul>
													@endif
												@endif
												@if (($parent != null) && ($item['id'] == $parent['id']))
													@if (count($parent['childs']) > 0)
														<ul class="ml-2">
															@foreach($parent['childs'] as $child)
																<li>
																	<a href="{{ route('products') }}?category={{ $child['id'] }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child['id'] == $category['id']) ? 'bg-cdsolec-green-light' : '' }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child['label'] }}
																	</a>
																</li>
															@endforeach
														</ul>
													@endif
												@endif
											</li>
										@endforeach
									</ul>
								@endif
							</div>
						</div>
					</div>
      	</div>
      	<div class="relative md:col-span-3 lg:col-span-4">
					@if ($products && $products->isNotEmpty())
						<table class="w-full rounded-lg overflow-hidden border-collapse border border-gray-300">
							<thead class="bg-gray-300">
								<tr class="hidden lg:table-row text-sm leading-4 tracking-wider">
									<th class="py-3" style="width: 100px">Comparar</th>
									<th class="py-3">Información</th>
									<th class="py-3" style="width: 120px">Disponiblidad</th>
									<th class="py-3" style="width: 140px">Precio</th>
									<!-- <th class="py-3" style="width: 140px">Cantidad</th> -->
								</tr>
							</thead>
							<tbody class="w-full flex-1 sm:flex-none bg-white divide-y divide-gray-400 text-sm leading-5">
								@foreach ($products->items() as $product)
								<tr class="flex flex-col lg:table-row even:bg-gray-200">
									<td class="border border-gray-300 flex flex-row lg:table-cell">
										<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
											Comparar
										</div>
										<div class="p-2 flex">
											<!-- <input type="checkbox" class="form-checkbox" /> -->
											<img class="w-14 ml-2 img-zoomable" src="{{ asset('img/favicon/apple-icon.png') }}" alt="Producto" title="Porducto" />
										</div>
									</td>
									<td class="border border-gray-300 flex flex-row lg:table-cell">
										<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
											Información
										</div>
										<div class="p-2">
											<a href="{{ route('product', $product['id']) }}" class="text-cdsolec-blue-light font-bold">
												{{ $product['description'] }}
											</a>
											<p>Ref: {{ $product['ref'] }}</p>
											<img class="h-5 w-5" src="{{ asset('img/pdf.png') }}" alt="Datasheet" title="Datasheet" />
										</div>
									</td>
									<td class="border border-gray-300 flex flex-row lg:table-cell">
										<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
											Disponibilidad
										</div>
										<div class="p-2 lg:text-right">
											Stock: {{ $product['stock_reel'] }}<br />
											<!-- Orden: 630 -->
										</div>
									</td>
									<td class="border border-gray-300 flex flex-row lg:table-cell">
										<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
											Precio
										</div>
										<div class="p-2 lg:text-right">
											{{ number_format($product['price'], 2, ',', '.') }}
										</div>
									</td>
									<!-- <td class="border border-gray-300 flex flex-row lg:table-cell">
										<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
											Cantidad
										</div>
										<div class="p-2 text-center">
											<div class="w-full flex pb-2">
												<button type="button" class="px-3 py-2 border border-gray-500 font-semibold">+</button>
												<input type="text" name="cantidad" id="cantidad" class="w-20" />
												<button type="button" class="px-3 py-2 border border-gray-500 font-semibold">-</button>
											</div>
											<button type="button" class="px-4 py-1 font-semibold bg-cdsolec-green-dark text-white uppercase text-xs">
												Agregar al <br />
												Carrito <i class="fas fa-shopping-cart"></i>
											</button>
										</div>
									</td> -->
								</tr>
								@endforeach
							</tbody>
						</table>

						<div class="my-2 text-right">
							{{ $products->links() }}
						</div>
					@else
						<div class="w-full px-3 py-2 rounded border border-blue-600 bg-blue-200 text-blue-600 text-sm font-bold">
							No hay productos disponibles
						</div>
					@endif
      	</div>
      </div>
    </div>
	@endsection

	@push('scripts')
		<script>
			let myFilters = document.getElementsByName('filters');
			let setCheck;
			for(let x = 0; x < myFilters.length; x++) {
				myFilters[x].onclick = function() {
					if(setCheck != this) {
						setCheck = this;
					} else {
						this.checked = false;
						setCheck = null;
					}
				};
			}
		</script>
	@endpush
</x-web-layout>
