<x-welcome-layout title="Welcome">
	@push('styles')

	@endpush
	<div class="container pt-36 mx-auto">
		<div class="splide" data-splide='{"gap":"1em","type":"loop", "perPage": 2, "perMove": 1, "height": "12rem", "fixedWidth": "12rem", "focus": "center", "lazyLoad": true}'>
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

			<div class="splide__progress">
				<div class="splide__progress__bar">
				</div>
			</div>
		</div>
	</div>
	<div class="container pt-36 mx-auto">

	</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('js/splide.js') }}"></script>

<script type="text/javascript">
	

window.onscroll = function() {
		var y = window.scrollY;
		//console.log(y);
		let navbar = document.querySelector('nav');
		if (y > 120) {
			navbar.classList.add("bg-green-300");
		}
		if (y < 100) {			
			navbar.classList.remove("bg-green-300");
		}
	};
	/*document.querySelector('#prueba #id3.clase')*/

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