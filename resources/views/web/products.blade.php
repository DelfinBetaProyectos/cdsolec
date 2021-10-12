<x-web-layout title="Productos">
	@section('background', asset('img/slide1.jpg'))

	@section('content')
    <div class="container mx-auto px-6">
		@if ($category)
			<nav class="mb-3 px-3 py-2 rounded bg-gray-200 text-gray-600">
				<ol class="flex flex-wrap">
					<li><span class="text-cdsolec-green-dark">{{ $category->label }}</span></li>
					<li><span class="mx-2">/</span>Productos</li>
				</ol>
			</nav>

			@if (count($category->childs) > 0)
				<div class="mb-3 px-3 py-2 rounded-lg bg-cdsolec-green-dark text-white h-32 overflow-x-auto flex flex-col flex-wrap">
					@foreach($category->childs as $child)
						<a href="{{ route('products').'?category='.$child->id }}" class="block px-2 hover:text-cdsolec-green-light">
							<span class="fas fa-angle-right mr-1"></span>
							{{ $child->label }}
						</a>
					@endforeach
				</div>
			@endif
		@endif
		<div class="py-5">
			<h6 class="text-cdsolec-blue-light font-semibold">Inicio / Productos /</h6>
			<h5 class="text-cdsolec-green-dark font-semibold text-xl py-1">Breaker Panels / Load Centers</h5>
			<div class="bg-gray-300 p-5">
				<div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
					<div class="bg-white p-2 shadow-md">
						<div class="flex flex-wrap">
							<img class="h-10 w-10" src="{{ asset('img/p1.jpg') }}" alt="Producto" title="Porducto" />
							<div class="flex-1">
								<h4 class="text-cdsolec-blue-light font-bold">Equipo xxxxxxxxxx</h4>
								<span class="text-xs">(350 Resultados)</span>
							</div>
						</div>
					</div>
					<div class="bg-white p-2 shadow-md">
						<div class="flex flex-wrap">
							<img class="h-10 w-10" src="{{ asset('img/p1.jpg') }}" alt="Producto" title="Porducto" />
							<div>
								<h4 class="text-cdsolec-blue-light font-bold">Equipo xxxxxxxxxx</h4>
								<span class="text-xs">(350 Resultados)</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


			
      <div class="grid md:grid-flow-col md:auto-cols-auto gap-4">
      	<div class="px-2">
      		<div class="flex">
      			<input type="text" name="buscar" id="buscar" class="w-44" />
            	<button type="button" class="px-3 py-2 bg-cdsolec-green-dark font-semibold text-white"><i class="fas fa-search"></i></button>
      		</div>
      		<div class="shadow-md my-5">
		        <div class="tab w-full overflow-hidden border-t mb-2">
		           <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs">
		           <label class="block p-4 leading-normal cursor-pointer bg-gray-300" for="tab-multi-one">Categorias</label>
		           <div class="tab-content overflow-hidden bg-gray-100 leading-normal">
		           		<ul class="text-cdsolec-blue-light">
		           			<li class="m-2">xxxxxxx</li>
		           			<li class="m-2">xxxxxxx</li>
		           		</ul>
		           </div>
		        </div>
		        <div class="tab w-full overflow-hidden border-t mb-2">
		           <input class="absolute opacity-0" id="tab-multi-two" type="checkbox" name="tabs">
		           <label class="block p-4 leading-normal cursor-pointer bg-gray-300" for="tab-multi-two">SubCategorias</label>
		           <div class="tab-content overflow-hidden bg-gray-100 leading-normal">
		           		<ul class="text-cdsolec-blue-light">
		           			<li class="m-2">xxxxxxx</li>
		           			<li class="m-2">xxxxxxx</li>
		           		</ul>
		           </div>
		        </div>
     		</div>
      	</div>
      	<div class="w-full">
      		<table class="w-full rounded-lg overflow-hidden border-collapse border border-gray-300">
      			<thead class="bg-gray-300 py-2">
	              <tr class="hidden lg:table-row text-sm leading-4 tracking-wider">
	                <th style="width: 150px" class="py-4 border border-gray-300">Comparar</th>
	                <th class="py-4 border border-gray-300">Información</th>
	                <th style="width: 150px" class="py-4 border border-gray-300">Disponiblidad</th>
	                <th style="width: 150px" class="py-4 border border-gray-300">Precio</th>
	                <th class="py-4 border border-gray-300">Cantidad</th>
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
	        var myRadios = document.getElementsByName('tabs');
	        var setCheck;
	        var x = 0;
	        for(x = 0; x < myRadios.length; x++){
	            myRadios[x].onclick = function(){
	                if(setCheck != this){
	                    setCheck = this;
	                }else{
	                    this.checked = false;
	                    setCheck = null;
	            }
	            };
	        }
    	</script>
	@endpush
</x-web-layout>

