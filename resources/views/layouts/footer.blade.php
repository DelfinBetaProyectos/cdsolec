<footer class="relative mt-0 text-white">
	<div class="bg-blue-700 pt-8">
		<div class="container ml-10">
			<div class="grid gap-2 grid-cols-1 md:grid-cols-2">
				<div class="relative">
					<div class="absolute bg-blue-800 top-0 bottom-0 -right-20 md:right-0 -left-10 block" style="transform: skew( 20deg); transform-origin: 100% 145%; pointer-events: none;">
						
					</div>
					<div class="relative py-9 px-0 flex flex-wrap">
						<div class="pl-1">
							<i class="fas fa-phone fa-lg p-4"></i>
						</div>
						<div class="pl-1">
							<a href="#" class="text-2xl">0243 000.00.00</a>
							<p class="mt-1">Atención de Lunes - Viernes 7:00am hasta 5:00pm</p>
						</div>
					</div>
				</div>
				<div>
					<div class="flex flex-wrap">
						<h3 class="text-4xl">Subcribete</h3>
						<p class="mt-auto ml-2 mb-1">Obten más de nuestras ofertas.</p>
					</div>
					<form class="grid grid-cols-2" action="">
						<div class="relative">
							<x-jet-input id="email" class="block mt-1 w-full text-gray-600" type="email" name="email" :value="old('email')" required placeholder="Email."/>					
						</div>
						<div class="relative">
							<x-jet-button class="ml-3 py-3 px-4 ml-1 mt-1">
								{{ __('Subcribete') }}
							</x-jet-button>
						</div>
					</form>
				</div>
			</div>
			<div class="grid gap-3 grid-cols-1 md:grid-cols-3 mt-6">
				<div class="relative mr-24 pb-10">
					<div class="uppercase text-2xl border-l-8 border-yellow-400">
						<h2 class="ml-2">ABOUT US</h2>
					</div>
					<hr class="my-4">
					<p class="text-sm mt-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
					<ul class="mt-8 flex flex-row list-none items-center">
						<li>
							<a href="#" class="px-3 py-4 md:py-2 flex items-center text-xs uppercase font-bold">
							<i class="fab fa-facebook text-lg leading-lg"></i></a>
						</li>
						<li>
							<a href="#" class="px-3 py-4 md:py-2 flex items-center text-xs uppercase font-bold">
							<i class="fab fa-twitter text-lg leading-lg"></i></a>
						</li>
						<li>
							<a href="#" class="px-3 py-4 md:py-2 flex items-center text-xs uppercase font-bold">
							<i class="fab fa-google-plus text-lg leading-lg"></i></a>
						</li>
						<li>
							<a href="#" class="px-3 py-4 md:py-2 flex items-center text-xs uppercase font-bold">
							<i class="fab fa-instagram text-lg leading-lg"></i></a>
						</li>
					</ul>
				</div>				
				<div class="relative mr-24 pb-10">
					<div class="uppercase text-2xl border-l-8 border-yellow-400">
						<h2 class="ml-2">Nuevo</h2>
					</div>
					<hr class="my-4">
					<article class="flex mb-4">
						<div class="mr-2">
							<a href="#" class="hover:text-yellow-400">
								<img src="" alt="80 x 68" width="80" height="68">
							</a>
						</div>
						<div>
							<p class="pb-2">
								<a href="#" class="hover:text-yellow-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
							</p>
							<time datetime="2011-01-12">January 12th, 2011</time>
						</div>
					</article>
					<article class="flex mb-4">
						<div class="mr-2">
							<a href="#" class="hover:text-yellow-400">
								<img src="" alt="80 x 68" width="80" height="68">
							</a>
						</div>
						<div>
							<p class="pb-2">
								<a href="#" class="hover:text-yellow-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
							</p>
							<time datetime="2011-01-12">January 12th, 2011</time>
						</div>
					</article>
				</div>				
				<div class="relative mr-24 pb-10">
					<div class="uppercase text-2xl border-l-8 border-yellow-400">
						<h2 class="ml-2">Acceso</h2>
					</div>
					<hr class="my-4">
					<div class="flex flex-wrap text-sm mt-6">
						<div class="w-1/2">
							<ul class="text-base">
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">uno</a>
								</li>
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">dos</a>
								</li>
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">tres</a>
								</li>
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">cua</a>
								</li>
							</ul>
						</div>
						<div class="w-1/2">
							<ul class="text-base">
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">Acceso uno</a>
								</li>
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">Acceso dos</a>
								</li>
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">Acceso tres</a>
								</li>
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">Acceso cua</a>
								</li>
								<li>
									<i class="fas fa-angle-right text-yellow-400 mr-1"></i>
									<a href="#" class="hover:text-yellow-400">Acceso cinco</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-blue-600 flex flex-wrap items-center md:justify-between justify-center py-3">
		<div class="w-full md:w-4/12 px-4 mx-auto text-center">
			<div class="text-sm font-semibold py-1">
				Copyright © <span id="get-current-year">{{ config('app.name', 'Laravel') }} {{ date('Y') }}</span> 
				<a href="/" class="text-blueGray-200 hover:text-blueGray-800">Creado.</a>.
			</div>
		</div>
	</div>
</footer>