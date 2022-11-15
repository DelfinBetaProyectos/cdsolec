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

			<nav class="my-2">
				<ol class="flex flex-wrap text-cdsolec-green-dark font-semibold text-xl">
					@if ($category->parent)
						<li>
							<a href="{{ route('products') }}?category={{ $category->parent->rowid }}">{{ $category->parent->label }}</a><span class="mx-2">/</span>
						</li>
					@endif
					<li>
						<a href="{{ route('products') }}?category={{ $category->rowid }}">{{ $category->label }}</a><span class="mx-2">/</span>
					</li>
				</ol>
			</nav>

			@if ($category->subcategories->isNotEmpty())
				<div class="my-2 p-2 rounded-lg bg-gray-300 h-64 overflow-x-auto flex flex-col flex-wrap">
					@foreach($category->subcategories as $subcategory)
						<div class="m-2 p-2 bg-white shadow-md">
							<a href="{{ route('products').'?category='.$subcategory->rowid }}" class="block">
								<h4 class="text-cdsolec-blue-light font-bold">{{ $subcategory->label }}</h4>
								<p class="text-xs">({{ $subcategory->products->count() }} Resultados)</p>
							</a>
						</div>
					@endforeach
				</div>
			@endif

			<div class="mt-3 grid gap-4 grid-cols-1 md:grid-cols-4 lg:grid-cols-5">
      	<div class="relative">
      		<div class="flex mb-3">
      			<form method="GET" action="{{ route('products') }}" class="w-full">
              @csrf
              <label for="search" class="sr-only">Buscar</label>
              <div class="relative rounded-md shadow-sm">
                <input type="text" name="search" id="search2" value="{{ request('search', '') }}" class="block w-full pl-2 pr-12 text-sm rounded-md border border-cdsolec-green-dark focus:ring-gray-300 focus:border-gray-300" placeholder="Buscar" />
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
		          <input type="checkbox" id="tab-one" name="filters" class="absolute opacity-0" />
							<label class="block p-2 cursor-pointer bg-gray-300 text-cdsolec-blue-light" for="tab-one">
								Categorías
							</label>
							<div class="tab-content overflow-hidden bg-gray-100">
								@if ($categories->isNotEmpty())
									<ul class="text-cdsolec-blue-light">
										@foreach($categories as $item)
											@php
												$bg = '';
												if (($item->rowid == $category->rowid) || 
														($category->parent && ($item->rowid == $category->parent->rowid))) {
													$bg = 'bg-cdsolec-green-light';
												}
											@endphp
											<li>
												<a href="{{ route('products') }}?category={{ $item->rowid }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ $bg }}">
													{{ $item->label }}
												</a>
												@if (($item->rowid == $category->rowid) || 
														 ($category->parent && ($item->rowid == $category->parent->rowid)))
													@if ($item->subcategories->isNotEmpty())
														<ul class="ml-2">
															@foreach($item->subcategories as $child)
																<li>
																	<a href="{{ route('products') }}?category={{ $child->rowid }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child->rowid == $category->rowid) ? 'bg-cdsolec-green-light' : '' }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child->label }}
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
		          <input type="checkbox" id="tab-two" name="filters" class="absolute opacity-0" />
							<label class="block p-2 cursor-pointer bg-gray-300 text-cdsolec-blue-light" for="tab-two">
								Sectores de Interés
							</label>
							<div class="tab-content overflow-hidden bg-gray-100">
								@if ($sectors->isNotEmpty())
									<ul class="text-cdsolec-blue-light">
										@foreach($sectors as $item)
											@php
												$bg = '';
												if (($item->rowid == $category->rowid) || 
														($category->parent && ($item->rowid == $category->parent->rowid))) {
													$bg = 'bg-cdsolec-green-light';
												}
											@endphp
											<li>
												<a href="{{ route('products') }}?category={{ $item->rowid }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ $bg }}">
													{{ $item->label }}
												</a>
												@if (($item->rowid == $category->rowid) || 
														 ($category->parent && ($item->rowid == $category->parent->rowid)))
													@if ($item->subcategories->isNotEmpty())
														<ul class="ml-2">
															@foreach($item->subcategories as $child)
																<li>
																	<a href="{{ route('products') }}?category={{ $child->rowid }}" class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child->rowid == $category->rowid) ? 'bg-cdsolec-green-light' : '' }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child->label }}
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
						@if ($extrafields->isNotEmpty())
							@foreach ($extrafields as $extrafield)
								@if (isset($attributes[$extrafield->name]))
									<div class="tab w-full overflow-hidden border-t mb-3 rounded-md shadow-md">
										<input type="checkbox" id="tab-{{ $loop->iteration }}" name="filters" class="absolute opacity-0" checked />
										<label class="block p-2 cursor-pointer bg-gray-300 text-cdsolec-blue-light" for="tab-{{ $loop->iteration }}">
											{{ $attributes[$extrafield->name] }}
										</label>
										<div class="tab-content overflow-hidden bg-gray-100">
											@php
												$unique = $matriz->unique($extrafield->name);
												$values = $unique->values()->all();
											@endphp
											@if (count($values) > 0)
												<ul class="text-cdsolec-blue-light">
													@foreach ($values as $value)
														<li>
															<a href="{{ route('products') }}" class="px-2 py-1 block hover:bg-cdsolec-green-light">
																<span class="fas fa-angle-right mr-1"></span> {{ $value[$extrafield->name] }}
															</a>
														</li>
													@endforeach
												</ul>
											@endif
										</div>
									</div>
								@endif
							@endforeach
						@endif
					</div>
      	</div>
      	<div class="relative md:col-span-3 lg:col-span-4">
					@if ($products->isNotEmpty())
						<div class="my-2 rounded-lg bg-gray-300 overflow-x-auto flex flex-wrap">
							<table class="w-full rounded-lg overflow-hidden border-collapse border border-gray-300">
								<thead class="bg-gray-300">
									<tr class="hidden lg:table-row text-sm leading-4 tracking-wider">
										<th class="py-3" style="min-width: 80px">&nbsp;</th>
										<th class="py-3" style="min-width: 400px">Información</th>
										<th class="py-3" style="min-width: 120px">Disponiblidad</th>
										<th class="py-3" style="min-width: 140px">Precio</th>
										<th class="py-3" style="min-width: 140px">Cantidad</th>
										@if ($extrafields->isNotEmpty())
											@foreach ($extrafields as $extrafield)
												@if (isset($attributes[$extrafield->name]))
													<th class="py-3" style="min-width: 160px">{{ $attributes[$extrafield->name] }}</th>
												@endif
											@endforeach
										@endif
									</tr>
								</thead>
								<tbody class="w-full flex-1 sm:flex-none bg-white divide-y divide-gray-400 text-sm leading-5">
									@foreach ($products as $product)
										@php
											if (app()->environment('production')) {
												$image = null;
												$datasheet = null;
												if ($product->documents->isNotEmpty()) {
													$documents = $product->documents;
													$total = count($product->documents);
													$i = 0;
													while ((!$datasheet || !$image) && ($i < $total)) {
														if (!$datasheet && (pathinfo($documents[$i]->filename, PATHINFO_EXTENSION) == 'pdf')) {
															$datasheet = 'storage/produit/'.$product->ref.'/'.$documents[$i]->filename;
														}
														if (!$image && (pathinfo($documents[$i]->filename, PATHINFO_EXTENSION) == 'jpg')) {
															$image = 'storage/produit/'.$product->ref.'/'.$documents[$i]->filename;
														}
														$i++;
													}
												}

												if (!$image) { $image = 'img/favicon/apple-icon.png'; }
											} else {
												$image = 'img/favicon/apple-icon.png';
												$datasheet = null;
											}

											$product_fields = $product->extrafields->toArray();
										@endphp
										<tr class="flex flex-col lg:table-row even:bg-gray-300">
											<td class="border border-gray-300 flex flex-row lg:table-cell">
												<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
													Comparar
												</div>
												<div class="p-2 flex">
													<img src="{{ asset($image) }}" alt="{{ $product->label }}" title="{{ $product->label }}" class="w-12 ml-2 img-zoomable" />
												</div>
											</td>
											<td class="border border-gray-300 flex flex-row lg:table-cell">
												<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
													Información
												</div>
												<div class="p-2">
													<a href="{{ route('product', $product->ref) }}" class="text-cdsolec-blue-light font-bold">
														{{ $product->label }}
													</a>
													<p>Ref: {{ $product->ref }}</p>
													@if ($datasheet)
														<p>
															<a href="{{ $datasheet }}" target="_blank">
																<img class="h-5 w-5 inline" src="{{ asset('img/pdf.png') }}" alt="Datasheet" title="Datasheet" /> Descargar Datasheet
															</a>
														</p>
													@endif
												</div>
											</td>
											<td class="border border-gray-300 flex flex-row lg:table-cell">
												<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
													Disponibilidad
												</div>
												<div class="p-2 lg:text-right">
													Stock: {{ $product->stock - $product->seuil_stock_alerte }}
												</div>
											</td>
											<td class="border border-gray-300 flex flex-row lg:table-cell">
												<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
													Precio
												</div>
												<div class="p-2 lg:text-right">
													<p>Bs {{ number_format(($product->prices[0]->price * $tasa_usd), 2, ',', '.') }}</p>
													<p>$USD {{ number_format($product->prices[0]->price, 2, ',', '.') }}</p>
												</div>
											</td>
											<td class="border border-gray-300 flex flex-row lg:table-cell">
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
														Agregar <i class="fas fa-shopping-cart"></i>
													</button>
												</div>
											</td>
											@if ($extrafields->isNotEmpty())
												@foreach ($extrafields as $extrafield)
													@if (isset($attributes[$extrafield->name]))
														<td class="border border-gray-300 flex flex-row lg:table-cell">
															<div class="p-2 w-32 lg:hidden bg-gray-300 text-sm leading-4 tracking-wider font-bold">
																{{ $attributes[$extrafield->name] }}
															</div>
															<div class="p-2 lg:text-right">
																<p>{{ $product_fields[$extrafield->name] }}</p>
															</div>
														</td>
													@endif
												@endforeach
											@endif
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
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
