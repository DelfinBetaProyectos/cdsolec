<x-welcome-layout title="Compra">
	@push('styles')

	@endpush
	 <div class="bg-gray-200">	
		<div class="relative bg-cdsolec-green-dark px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-44 flex
      items-center" style="border-bottom-right-radius: 156px;">
			<div class="h-full w-full absolute top-0 left-0 z-0">
				<img src="{{ asset('img/Logos/Logo_CDSOLECFachada_.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
			</div>
		</div>
	</div>

	<div class="relative bg-gray-200 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-4">
		<div class="p-3 flex lg:flex-row flex-col justify-between bg-gray-400 rounded-xl border border-gray-500 items-center">
    		<div class="text-xl"><i class="far fa-check-circle"></i> Resumen de Compra</div>
    		<div class="lg:w-1/5 mx-2 lg:my-0 my-2">
    			<a href="" class="px-4 py-2 bg-red-700 text-white rounded inline-block font-semibold"><i class="fas fa-trash-alt"></i> Vaciar Carrito</a>
    		</div>
		</div>
		<table class="table-auto w-full mt-8 text-sm lg:text-base">
            <thead>
              <tr class="lg:text-lg text-sm">
                <th class="border-b border-gray-500 md:w-1/12 w-0"></th>
                <th class="border-b border-gray-500 text-left">Producto</th>
                <th class="border-b border-gray-500">Cantidad</th>
                <th class="border-b border-gray-500 text-right">Precio</th>
                <th class="border-b border-gray-500 text-right">Subtotal</th>
                <th class="border-b border-gray-500"></th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b border-gray-500">
                <td class="p-2">
                  <img src="{{ asset('img/p1.jpg') }}" alt="name" title="name" class="w-full hidden md:block" />
                </td>
                <td class="p-2">
                  Cable xxx
                </td>
                <td class="p-2 text-center">
                  <input type="number" name="cantidad" id="cantidad" min="1" step="1" class="lg:w-1/4 w-full py-2 px-3 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm text-right" placeholder="1">
                </td>
                <td class="p-2 text-right">
                  $100.00
                </td>
                <td class="p-2 text-right">
                  $1000.00
                </td>
                <td class="p-2 text-center">
                  <button type="button" class="focus:outline-none">
                    <i class="fas fa-times text-red-600"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="p-2 text-right font-bold" colspan="4">Subtotal:</td>
                <td class="p-2 text-right font-bold">$1000.00</td>
                <td></td>
              </tr>
              <tr>
                <td class="p-2 text-right font-bold" colspan="4">IVA 16 %:</td>
                <td class="p-2 text-right font-bold">$1.00</td>
                <td></td>
              </tr>
              <tr class="border-t border-b border-gray-500 bg-gray-300">
                <td class="p-2 text-right font-bold text-cdsolec-green-dark" colspan="4">TOTAL:</td>
                <td class="p-2 text-right font-bold text-cdsolec-green-dark">$1100.00</td>
                <td></td>
              </tr>
            </tbody>
          </table>

       <div class="flex flex-wrap justify-between lg:p-4 p-1">
          <button  class="py-3 lg:px-11 px-5 text-white bg-cdsolec-green-dark rounded">Seguir Comprando</button>
          <button class="py-3 lg:px-11 px-5 text-white bg-cdsolec-green-light rounded font-semibold mt-1 lg:mt-0">Confirmar Compra</button>
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