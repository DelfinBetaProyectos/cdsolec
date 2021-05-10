<x-welcome-layout title="Welcome">
	@push('styles')

	@endpush
	<div class="bg-gray-200">	
		<div class="bg-gray-200 relative bg-green-600 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-32 flex
      items-center" style="border-bottom-right-radius: 256px;">
			<div class="h-full absolute top-0 left-0 z-0">
				<img src="{{ asset('img/Logos/Logo-CD-SOLEC-2.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
			</div>
			<div class="lg:w-3/4 xl:w-2/4 relative z-1 h-100 lg:mt-16">
				<div>
					<h1 class="text-white text-4xl md:text-5xl xl:text-6xl font-bold leading-tight">Lorem ipsum consectetur adipisicing elit.</h1>
					<p class="text-blue-100 text-xl md:text-2xl leading-snug mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit verde rgb(135, 182, 65)</p>
					<a href="#" class="px-8 py-4 bg-teal-500 text-white rounded inline-block mt-8 font-semibold">ass</a>
				</div>
			</div>
		</div>
	</div>		
	
	<div class="relative bg-gray-200 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 py-32">
		<div class="flex flex-col md:flex-row lg:-mx-8">
			<div class="w-full lg:w-1/2 lg:px-8">
				<h6 class="text-sm uppercase font-semibold tracking-widest">En principio de nuestro</h6>
				<h2 class="text-3xl leading-tight font-bold mt-4">Bienvenido a nuestra pagina</h2>
				<p class="text-lg mt-4">Excelente atencion al cliente</p>
				<p class="mt-2 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipisicing elit
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="w-full lg:w-1/2 lg:px-8">
				<div class="flex">
					<div>
						<div class="w-16 h-16 bg-blue-600 rounded-full"></div>
					</div>
					<div class="ml-8">
						<h4 class="text-xl font-bold">Todo lo que necesita para tu trabajo bajo un mismo techo</h4>
						<p class="mt-2 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>

				<div class="flex mt-8">
					<div>
						<div class="w-16 h-16 bg-blue-600 rounded-full"></div>
					</div>
					<div class="ml-8">
						<h4 class="text-xl font-bold">Nuestro enfoque centrado en trabajo </h4>
						<p class="mt-2 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipisicing elit
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="splide bg-gray-100" data-splide='{"type":"loop", "perPage": 1, "height": "100vh", "autoplay": true}'>		
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
	</div>

	<div class="container mx-auto my-2">
		<div class="bg-white border-2 border-gray-300">
			<div class="w-full bg-gray-400 block px-4 py-3">
				Nuestra Marcas
			</div>
			<div class="splide" data-splide='{"gap":"1em","type":"loop", "perPage": 2, "perMove": 1, "height": "12rem", "fixedWidth": "12rem", "focus": "center", "lazyLoad": true, "autoplay": true}'>
				<div class="splide__track">
					<ul class="splide__list">
						<li class="splide__slide" style="">
							<img data-splide-lazy="{{ asset('img/huma01.jpg') }}" alt="">
						</li>
						<li class="splide__slide" style="">
							<img data-splide-lazy="{{ asset('img/huma02.jpg') }}" alt="" >
						</li>
						<li class="splide__slide" style="">				
							<img data-splide-lazy="{{ asset('img/l-mercatil.png') }}" alt="">
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
	</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('js/splide.js') }}"></script>

<script type="text/javascript">
	var elms = document.getElementsByClassName( 'splide' );
	for ( var i = 0, len = elms.length; i < len; i++ ) {
		new Splide.default( elms[ i ] ).mount();
	}
	//console.log(elms);

	window.onscroll = function() {
		var y = window.scrollY;
		//console.log(y);
		let navbar = document.querySelector('nav');
		if (y > 120) {
			navbar.classList.add("bg-green-600");
		}
		if (y < 100) {			
			navbar.classList.remove("bg-green-600");
		}
	};

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
		document.getElementById(dropdownID).classList.toggle("isActive");
	}
</script>
@endpush

</x-welcome-layout>