<x-welcome-layout title="Nosotros">
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

	<div class="relative bg-gray-200 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-12">
		<div class="flex flex-col md:flex-row lg:-mx-6 items-center">
			<div class="">
               <div class="border-l-8 border-cdsolec-green-dark">
				<h6 class="text-2xl uppercase font-semibold tracking-wider ml-1">Nosotros</h6>
			   </div>

				<p class="mt-2 leading-relaxed text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elitcillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur.

				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

				</p>
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