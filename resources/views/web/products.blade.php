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
							<a href="{{ route('products') }}?category={{ $parent->id }}">{{ $parent->label }}</a><span class="mx-2">/</span>
						</li>
						<li>
							<a href="{{ route('products') }}?category={{ $category->id }}">{{ $category->label }}</a><span class="mx-2">/</span>
						</li>
					</ol>
				</nav>

				@if (count($category->childs) > 0)
					<div class="my-2 p-2 rounded-lg bg-gray-300 h-64 overflow-x-auto flex flex-col flex-wrap">
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
					</div>
					{{-- <div class="my-2 p-2 rounded-lg bg-gray-300 h-64 overflow-x-auto flex flex-col flex-wrap">
						@foreach($category->childs as $child)
							<div class="m-2 p-2 bg-white shadow-md">
								<a href="{{ route('products').'?category='.$child->id }}" class="block">
									<h4 class="text-cdsolec-blue-light font-bold">{{ $child->label }}</h4>
									<p class="text-xs">(350 Resultados)</p>
								</a>
							</div>
						@endforeach
					</div> --}}
				@endif
			@endif

			<div class="mt-3 grid gap-4 md:grid-flow-col md:auto-cols-auto">
      	<div class="w-full md:w-48 lg:w-60">
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
		          <input type="checkbox" id="tab-one" name="filters" class="absolute opacity-0" {{ (($category == null) || ($category->fk_parent == '715') || ($parent->fk_parent == '715')) ? 'checked' : '' }} />
							<label class="block p-2 cursor-pointer bg-gray-300 text-cdsolec-blue-light" for="tab-one">Categorías</label>
							<div class="tab-content overflow-hidden bg-gray-100">
								@if ($categories)
									<ul class="text-cdsolec-blue-light">
										@foreach($categories as $item)
											@php
												$bg = '';
												if (($category != null) && ($item->id == $category->id)) {
													$bg = 'bg-cdsolec-green-light';
												}
												if (($parent != null) && ($item->id == $parent->id)) {
													$bg = 'bg-cdsolec-green-light';
												}
											@endphp
											<li>
												<a class="px-2 py-1 block hover:bg-cdsolec-green-light {{ $bg }}" href="{{ route('products') }}?category={{ $item->id }}">
													{{ $item->label }}
												</a>
												@if (($category != null) && ($item->id == $category->id))
													@if (count($category->childs) > 0)
														<ul class="ml-2">
															@foreach($category->childs as $child)
																<li>
																	<a class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child->id == $category->id) ? 'bg-cdsolec-green-light' : '' }}" href="{{ route('products') }}?category={{ $child->id }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child->label }}
																	</a>
																</li>
															@endforeach
														</ul>
													@endif
												@endif
												@if (($parent != null) && ($item->id == $parent->id))
													@if (count($parent->childs) > 0)
														<ul class="ml-2">
															@foreach($parent->childs as $child)
																<li>
																	<a class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child->id == $category->id) ? 'bg-cdsolec-green-light' : '' }}" href="{{ route('products') }}?category={{ $child->id }}">
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
		          <input type="checkbox" id="tab-two" name="filters" class="absolute opacity-0" {{ (($category == null) || ($category->fk_parent == '693') || ($parent->fk_parent == '693')) ? 'checked' : '' }} />
							<label class="block p-2 cursor-pointer bg-gray-300 text-cdsolec-blue-light" for="tab-two">Sectores de Interés</label>
							<div class="tab-content overflow-hidden bg-gray-100">
								@if ($sectors)
									<ul class="text-cdsolec-blue-light">
										@foreach($sectors as $item)
											@php
												$bg = '';
												if (($category != null) && ($item->id == $category->id)) {
													$bg = 'bg-cdsolec-green-light';
												}
												if (($parent != null) && ($item->id == $parent->id)) {
													$bg = 'bg-cdsolec-green-light';
												}
											@endphp
											<li>
												<a class="px-2 py-1 block hover:bg-cdsolec-green-light {{ $bg }}" href="{{ route('products') }}?category={{ $item->id }}">
													{{ $item->label }}
												</a>
												@if (($category != null) && ($item->id == $category->id))
													@if (count($category->childs) > 0)
														<ul class="ml-2">
															@foreach($category->childs as $child)
																<li>
																	<a class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child->id == $category->id) ? 'bg-cdsolec-green-light' : '' }}" href="{{ route('products') }}?category={{ $child->id }}">
																		<span class="fas fa-angle-right mr-1"></span> {{ $child->label }}
																	</a>
																</li>
															@endforeach
														</ul>
													@endif
												@endif
												@if (($parent != null) && ($item->id == $parent->id))
													@if (count($parent->childs) > 0)
														<ul class="ml-2">
															@foreach($parent->childs as $child)
																<li>
																	<a class="px-2 py-1 block hover:bg-cdsolec-green-light {{ ($child->id == $category->id) ? 'bg-cdsolec-green-light' : '' }}" href="{{ route('products') }}?category={{ $child->id }}">
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
					</div>
      	</div>
      	<div class="w-full">
      		<table class="w-full rounded-lg overflow-hidden border-collapse border border-gray-300">
      			<thead class="bg-gray-300 py-2">
	              <tr class="hidden lg:table-row text-sm leading-4 tracking-wider">
	                <th style="width: 150px" class="py-3 border border-gray-300">Comparar</th>
	                <th class="py-3 border border-gray-300">Información</th>
	                <th style="width: 150px" class="py-3 border border-gray-300">Disponiblidad</th>
	                <th style="width: 150px" class="py-3 border border-gray-300">Precio</th>
	                <th class="py-3 border border-gray-300">Cantidad</th>
	              </tr>
            	</thead>
            	<tbody class="w-full flex-1 sm:flex-none bg-white divide-y divide-gray-400 text-sm leading-5">
            		<tr class="flex flex-col lg:table-row even:bg-gray-200">
            			<td class="p-2 border border-gray-300 flex flex-row lg:table-cell">
            				<div class="p-2 w-32 lg:hidden text-sm leading-4 tracking-wider font-bold">
                            	Comparar
                            </div>
            				<div class="flex p-2">
            					<input type="checkbox" class="form-checkbox"/>
            					<img class="h-20 w-20 ml-2 img-zoomable" src="{{ asset('img/p1.jpg') }}" alt="Producto" title="Porducto"/>
            				</div>
            			</td>
            			<td class="p-2 border border-gray-300 flex flex-row lg:table-cell">
            				<div class="p-2 w-32 lg:hidden text-sm leading-4 tracking-wider font-bold">
                            	Información
                            </div>
                            <div class="p-2">
                            	<a href="#" class="text-cdsolec-blue-light font-bold">Siemens <br/>
								Load Center, 400A, 6 Circuit, 120/240V, Single Phase, Enclosed</a>
								<p>Descripción</p>
								<img class="h-5 w-5" src="{{ asset('img/pdf.png') }}" alt="Datasheet" title="Datasheet" />
                            </div>
            			</td>
            			<td class="p-2 border border-gray-300 flex flex-row lg:table-cell">
            				<div class="p-2 w-32 lg:hidden text-sm leading-4 tracking-wider font-bold">
                            	Disponibilidad
                            </div>
                            <div class="p-2">
	            				Stock: 724 <br/>
	            				Orden: 630
	            			</div>
            			</td>
            			<td class="p-2 border border-gray-300 flex flex-row lg:table-cell">
            				<div class="p-2 w-32 lg:hidden text-sm leading-4 tracking-wider font-bold">
                            	Precio
                            </div>
                            <div class="p-2">
            					+1 18.74
            				</div>      
            			</td>
            			<td class="p-2 border border-gray-300 flex flex-row lg:table-cell">
            				<div class="p-2 w-32 lg:hidden text-sm leading-4 tracking-wider font-bold">
                            	Cantidad
                            </div>
                            <div class="p-2 text-center">
                            	<div class="flex pb-2">
            						<button type="button" class="px-3 py-2 border border-gray-500 font-semibold">+</button>
            						<input type="text" name="cantidad" id="cantidad" class="w-20" />
            						<button type="button" class="px-3 py-2 border border-gray-500 font-semibold">-</button>
            					</div>
            					<button type="button" class="px-5 py-1 font-semibold bg-cdsolec-green-dark text-white uppercase text-xs">Agregar al <br/>Carrito <i class="fas fa-shopping-cart"></i></button>
                            </div>
            				
            			</td>
            		</tr>
            	</tbody>
      		</table>
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
