<x-welcome-layout title="Welcome">
	@push('styles')

	@endpush
	<div class="bg-gray-200">	
		<div class="bg-gray-200 relative bg-cdsolec-green-dark px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-32 flex
      items-center" style="border-bottom-right-radius: 256px;">
			<div class="h-full absolute top-0 left-0 z-0">
				<img src="{{ asset('img/Logos/Logo-CD-SOLEC-2.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
			</div>
			<div class="lg:w-3/4 xl:w-2/4 relative z-1 h-100 lg:mt-16">
				<div>
					<h1 class="text-white text-4xl md:text-5xl xl:text-6xl font-semibold leading-tight">Soluciones en Electricidad y Comunicación</h1>
					 <p class="text-blue-100 text-xl md:text-2xl leading-snug mt-4">Conoce nuestros productos</p> 
					<a href="#" class="px-8 py-4 bg-teal-500 text-white rounded inline-block mt-8 font-semibold">Ver Mas <i class="fas fa-long-arrow-alt-right"></i> </a>
				</div>
			</div>
		</div>
	</div>		
	
	<div class="relative bg-gray-200 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-14">
		<div class="flex flex-col md:flex-row lg:-mx-6 items-center">
			<div class="w-full lg:w-4/5">
				<h6 class="text-sm uppercase font-semibold tracking-widest text-blue-800">Bienvenido a nuestro sitio web</h6>
				<h2 class="text-3xl leading-tight font-bold mt-4">Acerca de Nosotros</h2>
				<p class="mt-2 leading-relaxed text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elitcillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur.</p>
			</div>
			<div class="lg:w-1/5 text-center mx-4"><img src="{{ asset('img/Logos/Logo-CD-SOLEC- Verde.png') }}" alt="" class=""></div>
		</div>
	</div> 

	<div class="relative bg-gray-400 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-14">
		<div class="flex flex-col md:flex-row lg:-mx-6">
			<div class="w-full">
				<div class="text-center">
					<h6 class="text-sm uppercase font-semibold tracking-widest text-blue-800">Conoce nuestra variedad</h6>
					<h2 class="text-3xl leading-tight font-bold my-4">Marcas</h2>
				</div>
				<div class="container mx-auto grid grid-cols-2 lg:grid-cols-4 gap-4">
		            <div class="border border-gray-200 shadow overflow-hidden sm:rounded-lg">
		            	<div class="flex m-1">
						  <div class="mr-3">
						    <img alt="..." src="{{asset('img/m1.png')}}" class="shadow-lg rounded-full w-20" />
						  </div>
						  <div class="">
						  	<h6 class="text-2xl font-bold">Siemens</h6>
						  	<p class="text-cdsolec-green-dark font-semibold text-lg">(56)</p>
						  </div>
						</div>
		            </div>
		            <div class="border border-gray-200 shadow overflow-hidden sm:rounded-lg">
		            	<div class="flex m-1">
						  <div class="mr-3">
						    <img alt="..." src="{{asset('img/m1.png')}}" class="shadow-lg rounded-full w-20" />
						  </div>
						  <div class="">
						  	<h6 class="text-2xl font-bold">Siemens</h6>
						  	<p class="text-cdsolec-green-dark font-semibold text-lg">(56)</p>
						  </div>
						</div>
		            </div>
		            <div class="border border-gray-200 shadow overflow-hidden sm:rounded-lg">
		            	<div class="flex m-1">
						  <div class="mr-3">
						    <img alt="..." src="{{asset('img/m1.png')}}" class="shadow-lg rounded-full w-20" />
						  </div>
						  <div class="">
						  	<h6 class="text-2xl font-bold">Siemens</h6>
						  	<p class="text-cdsolec-green-dark font-semibold text-lg">(56)</p>
						  </div>
						</div>
		            </div>
		            <div class="border border-gray-200 shadow overflow-hidden sm:rounded-lg">
		            	<div class="flex m-1">
						  <div class="mr-3">
						    <img alt="..." src="{{asset('img/m1.png')}}" class="shadow-lg rounded-full w-20" />
						  </div>
						  <div class="">
						  	<h6 class="text-2xl font-bold">Siemens</h6>
						  	<p class="text-cdsolec-green-dark font-semibold text-lg">(56)</p>
						  </div>
						</div>
		            </div>
		        </div>
		        <div class="text-right">
		        	 <a href="#" class="px-8 py-4 bg-teal-500 text-white rounded inline-block mt-8 font-semibold">Ver Mas <i class="fas fa-long-arrow-alt-right"></i> </a>
		        </div>
			</div>
		</div>
	</div> 

	<!-- <div class="splide bg-gray-100" data-splide='{"type":"loop", "perPage": 1, "height": "100vh", "autoplay": true}'>		
		<div class="splide__arrows">
			<button class="splide__arrow splide__arrow--prev">
				<i class="fas fa-caret-square-left fa-5x ml-6"></i>
			</button>
			<button class="splide__arrow splide__arrow--next">
				<i class="fas fa-caret-square-right fa-5x mr-6"></i>
			</button>
		</div>		
		<div class="splide__track">
			<ul class="splide__list">
				<li class="splide__slide">
					<img src="{{ asset('img/slide-1.jpg') }}" alt="" class="w-full h-full border-2 border-black">
				</li>
				<li class="splide__slide">
					<img src="{{ asset('img/slide-2.png') }}" alt="" class="w-full h-full border-2 border-black">
				</li>
				<li class="splide__slide">
					<img src="{{ asset('img/slide-3.jpg') }}" alt="" class="w-full h-full border-2 border-black">
				</li>
			</ul>
		</div>				
	</div> -->

	<div class="container mx-auto my-2 py-14">
		<div class="text-center">
			<h6 class="text-sm uppercase font-semibold tracking-widest text-blue-800">Conoce nuestra variedad</h6>
			<h2 class="text-3xl leading-tight font-bold my-4">Productos Destacados</h2>
		</div>
		
			
		<div class="splide" data-splide='{"gap":"1em","type":"loop", "perPage": 2, "perMove": 1, "fixedWidth": "12rem", "focus": "center", "lazyLoad": true, "autoplay": true}'>
			<div class="splide__track">
				<ul class="splide__list">
					<li class="splide__slide border border-gray-400 rounded-xl">
						<div class="m-2">
							<img data-splide-lazy="{{ asset('img/p1.jpg') }}" alt="" class="shadow-lg rounded-xl">
						</div>
						<div class="text-center">
							<h6 class="text-lg font-semibold">Cable xxxxxxxx</h6>
							<div class="text-base text-cdsolec-green-dark">$10,00</div>
							<span class="bg-blue-800 text-blue-200 rounded-full py-0.5 px-2 text-sm w-min">Cables</span>

							<div class="py-2 my-1 border-t border-gray-400"><a href="">Detalles <i class="fas fa-long-arrow-alt-right"></i></a></div>
						</div>
					</li>
					<li class="splide__slide border border-gray-400 rounded-xl">
						
						<div class="m-2">
							<img data-splide-lazy="{{ asset('img/p1.jpg') }}" alt="" class="shadow-lg rounded-xl">
						</div>
						<div class="text-center">
							<h6 class="text-lg font-semibold">Cable xxxxxxxx</h6>
							<div class="text-base text-cdsolec-green-dark">$10,00</div>
							<span class="bg-blue-800 text-blue-200 rounded-full py-0.5 px-2 text-sm w-min">Cables</span>

							<div class="py-2 my-1 border-t border-gray-400"><a href="">Detalles <i class="fas fa-long-arrow-alt-right"></i></a></div>
						</div>
					</li>
				</ul>
			</div>
			{{--<div class="splide__arrows">
				<button class="splide__arrow splide__arrow--prev">
				</button>
				<button class="splide__arrow splide__arrow--next">
				</button>
			</div>--}}

			{{--<div class="splide__progress">
				<div class="splide__progress__bar">
				</div>
			</div>--}}
		</div>
		
	</div> 

@push('scripts')
<script type="text/javascript" src="{{ asset('js/splide.js') }}"></script>

<script type="text/javascript">
	var elms = document.getElementsByClassName( 'splide' );
	for ( var i = 0, len = elms.length; i < len; i++ ) {
		new Splide.default( elms[ i ] ).mount();
	}
	//console.log(elms);

	/*window.onscroll = function() {
		var y = window.scrollY;
		//console.log(y);
		let navbar = document.querySelector('nav');
		if (y > 120) {
			navbar.classList.add("bg-green-600");
		}
		if (y < 100) {			
			navbar.classList.remove("bg-green-600");
		}
	};*/

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
		/*document.getElementById(dropdownID).classList.toggle("isActive");*/
	}

</script>
@endpush

</x-welcome-layout>