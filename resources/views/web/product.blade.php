<x-welcome-layout title="Producto">
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

	<div class="relative bg-gray-200 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-4">
		<div class="flex flex-col md:flex-row lg:-mx-6 items-center">
			<div class="">
               <div class="border-l-8 border-cdsolec-green-dark">
				<h6 class="text-2xl uppercase font-semibold tracking-wider ml-1">Productos <span class="text-sm text-gray-600">| Cable xxxx</span></h6>
			   </div>

				<div class="grid gap-10 grid-cols-1 md:grid-cols-4 py-4">
					<div>
						<img src="{{ asset('img/p1.jpg') }}" alt="name" title="name" class="w-full" />
					</div>
					<div class="md:col-span-3">
						<div class="flex justify-start gap-3 items-center">
							<div><h6 class="text-cdsolec-green-dark text-2xl">Marca</h6></div>
							<div>
								<span class="bg-gray-500 text-white rounded-full py-0.5 px-8 text-sm w-min">Categoría</span>
							</div>
						</div>

						<p class="leading-relaxed text-justify py-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
						<div class="text-xl font-bold text-cdsolec-green-dark">$10,00</div>
						<a href="{{ route('cart') }}" class="px-4 py-2 bg-blue-500 text-white rounded inline-block font-semibold text-lg">Agregar <i class="fas fa-long-arrow-alt-right"></i></a>
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