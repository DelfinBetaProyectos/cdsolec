<x-web-layout title="Producto">
	@section('background', asset('img/slide1.jpg'))

	@section('content')
    <div class="container mx-auto px-6">
		<h6 class="text-sm uppercase font-semibold tracking-widest text-blue-800">
			Detalle del Producto
		</h6>
		<h6 class="text-cdsolec-blue-light font-semibold py-3"><a href="#"><i class="fas fa-arrow-left"></i> Atrás </a> | Inicio / Productos / Producto</h6>

		<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
			<div class="m-1">
				<img class="h-60 w-60" src="{{ asset('img/p1.jpg') }}" alt="Producto" title="Porducto"/>
			</div>
			<div>
				<h6 class="text-cdsolec-green-dark font-semibold text-lg py-1">Load Centers</h6>
				<strong>Descripción</strong>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<img class="h-5 w-5 inline" src="{{ asset('img/pdf.png') }}" alt="Datasheet" title="Datasheet" /> Descargar Datasheet 
			</div>
			<div class="m-1">
				<div class="flex flex-col lg:flex-row justify-between">
					<div class="flex p-1">
        				<button type="button" class="px-3 py-2 my-1 border border-gray-500 font-semibold">+</button>
        				<input type="text" name="cantidad" id="cantidad" class="w-20 my-1" />
        				<button type="button" class="px-5 py-2 my-1 border border-gray-500 font-semibold">-</button>
        			</div>
        			<div class="m-2"><button type="button" class="p-3 font-semibold bg-cdsolec-green-dark text-white uppercase text-xs">Agregar al Carrito <i class="fas fa-shopping-cart"></i></button></div>
        		</div>
    			<table class="w-full mb-5 text-sm">
    				<tr>
    					<td>Precio</td>
    					<td class="p-1 text-right">$1.100</td>
    				</tr>
    				<tr>
    					<td>Total</td>
    					<td class="text-right text-cdsolec-green-dark font-semibold">$1.100</td>
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
	@endsection
</x-web-layout>