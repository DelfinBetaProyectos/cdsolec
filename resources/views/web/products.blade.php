<x-welcome-layout title="Productos">
	@push('styles')

	@endpush
	<div class="bg-gray-200">	
		<div class="relative bg-cdsolec-green-dark px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-44 flex
      items-center" style="border-bottom-right-radius: 156px;">
			<div class="h-full absolute top-0 left-0 z-0">
				<img src="{{ asset('img/Logos/Logo_CDSOLECFachada_.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
			</div>
		</div>
	</div> 

	<div class="container mx-auto py-4">
		<div class="py-1 flex lg:flex-row flex-col justify-between border-b border-gray-400 shadow">
        	<div>
        		<div class="border-l-8 border-cdsolec-green-dark">
					<h6 class="text-2xl uppercase font-semibold tracking-wider ml-1">Productos <span class="text-sm text-gray-600">| Categoría 01</span></h6> 
			   </div>
        	</div>
        	<div class="lg:w-1/5 mx-2 lg:my-0 my-2">
        		<select class="border border-gray-400 py-1 px-2 bg-gray-300 rounded-xl shadow-md text-sm w-full">
		            <option value="">Ordenar por</option>
		            <option>Mas Vendidos</option>
		            <option>Precio</option>
          		</select>
        	</div>
		</div>
		<div class="grid md:grid-flow-col md:auto-cols-auto gap-4">
			<div class="md:w-52 sm:w-full px-2 py-2  border-r border-gray-400 mt-1">
				<h4 class="font-bold text-lg">Marcas</h4>
            	<div class="pt-0.5">
					<label for="siemens">
		                <input type="checkbox" id="" name="marca" class="focus:ring-green-500 h-4 w-4 text-ring-gray-400 border-gray-800 rounded" />
		                <span class="ml-1 text-sm font-medium">Siemens</span>
	              	</label>
              	</div>
              	<div class="pt-0.5">
					<label for="siemens">
		                <input type="checkbox" id="" name="marca" class="focus:ring-green-500 h-4 w-4 text-ring-gray-400 border-gray-800 rounded" />
		                <span class="ml-1 text-sm font-medium">Siemens</span>
	              	</label>
              	</div>
              	<div class="pt-0.5">
					<label for="siemens">
		                <input type="checkbox" id="" name="marca" class="focus:ring-green-500 h-4 w-4 text-ring-gray-400 border-gray-800 rounded" />
		                <span class="ml-1 text-sm font-medium">Siemens</span>
	              	</label>
              	</div>
	            <h4 class="font-bold pt-2 text-lg">Categorias</h4>
            	<div class="pt-0.5">
					<label for="siemens">
		                <input type="checkbox" id="" name="marca" class="focus:ring-green-500 h-4 w-4 text-ring-gray-400 border-gray-800 rounded" />
		                <span class="ml-1 text-sm font-medium">Siemens</span>
	              	</label>
              	</div>
              	<div class="pt-0.5">
					<label for="siemens">
		                <input type="checkbox" id="" name="marca" class="focus:ring-green-500 h-4 w-4 text-ring-gray-400 border-gray-800 rounded" />
		                <span class="ml-1 text-sm font-medium">Siemens</span>
	              	</label>
              	</div>
              	<div class="pt-0.5">
					<label for="siemens">
		                <input type="checkbox" id="" name="marca" class="focus:ring-green-500 h-4 w-4 text-ring-gray-400 border-gray-800 rounded" />
		                <span class="ml-1 text-sm font-medium">Siemens</span>
	              	</label>
              	</div>
			</div>
			<div class="mt-2 w-full">
				 <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
				 	<div class="border border-gray-400 rounded-xl">
						<div class="m-2">
							<img src="{{ asset('img/p1.jpg') }}" alt="" class="shadow-lg rounded-xl">
						</div>
						<div class="text-center">
							<h6 class="text-lg font-semibold">Cable xxxxxxxx</h6>
							<div class="text-base font-bold text-cdsolec-green-dark">$10,00</div>
							<span class="bg-gray-500 text-white rounded-full py-0.5 px-2 text-sm w-min">Cables</span>
							<div class="py-2 my-1 border-t border-gray-400">
								<a href="" class="px-4 py-2 bg-cdsolec-green-light text-white rounded inline-block font-semibold text-lg">Detalles <i class="fas fa-long-arrow-alt-right"></i></a>
							</div>
						</div>
					</div>
					<div class="border border-gray-400 rounded-xl">
						<div class="m-2">
							<img src="{{ asset('img/p1.jpg') }}" alt="" class="shadow-lg rounded-xl">
						</div>
						<div class="text-center">
							<h6 class="text-lg font-semibold">Cable xxxxxxxx</h6>
							<div class="text-base font-bold text-cdsolec-green-dark">$10,00</div>
							<span class="bg-gray-500 text-white rounded-full py-0.5 px-2 text-sm w-min">Cables</span>
							<div class="py-2 my-1 border-t border-gray-400">
								<a href="" class="px-4 py-2 bg-cdsolec-green-light text-white rounded inline-block font-semibold text-lg">Detalles <i class="fas fa-long-arrow-alt-right"></i></a>
							</div>
						</div>
					</div>
					<div class="border border-gray-400 rounded-xl">
						<div class="m-2">
							<img src="{{ asset('img/p1.jpg') }}" alt="" class="shadow-lg rounded-xl">
						</div>
						<div class="text-center">
							<h6 class="text-lg font-semibold">Cable xxxxxxxx</h6>
							<div class="text-base font-bold text-cdsolec-green-dark">$10,00</div>
							<span class="bg-gray-500 text-white rounded-full py-0.5 px-2 text-sm w-min">Cables</span>
							<div class="py-2 my-1 border-t border-gray-400">
								<a href="" class="px-4 py-2 bg-cdsolec-green-light text-white rounded inline-block font-semibold text-lg">Detalles <i class="fas fa-long-arrow-alt-right"></i></a>
							</div>
						</div>
					</div>
					<div class="border border-gray-400 rounded-xl">
						<div class="m-2">
							<img src="{{ asset('img/p1.jpg') }}" alt="" class="shadow-lg rounded-xl">
						</div>
						<div class="text-center">
							<h6 class="text-lg font-semibold">Cable xxxxxxxx</h6>
							<div class="text-base font-bold text-cdsolec-green-dark">$10,00</div>
							<span class="bg-gray-500 text-white rounded-full py-0.5 px-2 text-sm w-min">Cables</span>
							<div class="py-2 my-1 border-t border-gray-400">
								<a href="" class="px-4 py-2 bg-cdsolec-green-light text-white rounded inline-block font-semibold text-lg">Detalles <i class="fas fa-long-arrow-alt-right"></i></a>
							</div>
						</div>
					</div>
				 </div>
			</div>
		</div>
	</div> 		 
	

@push('scripts')

<script type="text/javascript">
	/* Function for dropdowns nav */
	function openNavItem(event, dropdownID) {
		event.preventDefault();
		let element = event.target;

		let elementActive = document.querySelector('.isActive');
		if (elementActive) {
			elementActive.classList.toggle("isActive");
			elementActive.classList.toggle("hidden");              	
		} 

		document.getElementById(dropdownID).classList.toggle("hidden");
		document.getElementById(dropdownID).classList.toggle("block");
	}

</script>
@endpush

</x-welcome-layout>