<header class="header z-40 bg-cdsolec-green-dark">
	<div class="border-t border-b border-cdsolec-green01 text-xs md:text-sm">
		<nav class="flex-wrap">
			<div class="container mx-auto">
				<div class="flex">
					<div class="mx-2">
						<a href="/">
							<img src="{{ asset('img/Logos/Logo-CD-SOLEC-Blanco.png') }}" alt="logo" class="h-30 w-32 mt-2">
						</a>  
					</div>
					<div class="w-full mx-2">
						<div class="border-b border-cdsolec-green01">
							 <div class="block md:hidden grid grid-cols-2">
								 {{-- <div class="justify-self-start">
									<button class="py-3 px-3 bg-gray-200 text-black rounded-md hover:text-blue-400" onclick="openNavItem(event,'us')">
										<i class="fas fa-bars"></i>
									</button>
								</div>		 --}}
								<div class="justify-self-start">
									<button class="py-3 px-3 bg-gray-200 text-black rounded-md hover:text-blue-400" onclick="openNavItem(event,'form')">
										<i class="fas fa-ellipsis-v fa-lg"></i>
									</button>
									<button class="py-3 px-3 bg-gray-200 text-black rounded-md hover:text-blue-400" onclick="openNavItem(event,'login')">
										<i class="fas fa-user-circle fa-lg"></i>
									</button>
								</div>		  
							</div>  
							<div class="grid gap-4 grid-cols-2 md:grid-cols-4">
								<div class="hidden md:block col-span-3">
									<ul class="flex flex-col md:flex-row list-none my-2">
										<li class="px-2 py-1 divide-x divide-gray-300 text-white text-base border-r border-gray-300">	
											<x-jet-dropdown align="left" width="60">
												<x-slot name="trigger">
													<button type="button" class="px-3">
														Bs VEF <i class="fas fa-angle-down"></i>
													</button>
												</x-slot>
												<x-slot name="content">
													<x-jet-dropdown-link href="#">
														{{ __('Bs VEF') }}
													</x-jet-dropdown-link>
													<x-jet-dropdown-link href="#">
														{{ __('$ USB') }}
													</x-jet-dropdown-link>
												</x-slot>
											</x-jet-dropdown>
										</li>
										<li class="px-2 py-1 text-white text-base">
											<i class="fas fa-phone"></i> 0243 000.00.00
										</li>
									</ul>
								</div>
								<div class="hidden md:block col-span-2 md:col-span-1" id="login">
									<div class="flex justify-end flex-col md:flex-row list-none my-2">
											<a href="{{ route('register') }}" class="ml-auto md:ml-0  md:w-auto border-r border-gray-300 divide-x divide-gray-300 mx-1 p-1 text-white hover:text-blue-800 text-base" title="Registro">
												<i class="fas fa-user"></i> Registro
											</a>	
											<a href="{{ route('login') }}" class="ml-auto md:ml-0  md:w-auto border-gray-300 divide-x divide-gray-300 mx-1 p-1 text-white hover:text-blue-800 text-base" title="Iniciar Sección">
												<i class="fas fa-sign-in-alt"></i> Login
											</a>	
									</div>
								</div>
							</div>
						</div>
						<div class="relative text-white">
							<div class="mx-auto flex flex-wrap justify-between">
								<ul class="flex order-2 md:order-1">
									
									<!--Hoverable Link-->
									<li class="hoverable hover:bg-white hover:text-cdsolec-green-dark">
										<a href="#" class="relative block py-3 px-4 lg:p-6 text-sm lg:text-xl uppercase">Productos</a>
										<div class="p-6 mega-menu mb-16 sm:mb-0 shadow-xl bg-white overflow-auto h-96">
										<div class="container mx-auto w-full flex flex-wrap mx-2">
											<ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-400 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
												<h3 class="text-xl text-cdsolec-green-dark text-bold mb-2">BY CATEGORY | INTEREST</h3>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												</ul>
												<ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-400 border-b sm:border-r-0 lg:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
												<h3 class="text-xl text-cdsolec-green-dark text-bold mb-2 uppercase">Categorías</h3>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												</ul>
												<ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-400 border-b sm:border-b-0 pb-6 pt-6 lg:pt-3">
												<h3 class="text-xl text-cdsolec-green-dark text-bold uppercase">Marcas</h3>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												<li>
													<a href="#" class="block p-3 text-gray-600 hover:text-cdsolec-green-dark text-base">Category One Sublink</a>
												</li>
												</ul>
										</div>
										</div>
									</li>
									<!--Regular Link-->
									<li class="uppercase">
										<a href="{{ route('about') }}" class="relative block py-3 px-2 lg:p-6 text-sm lg:text-xl">Nosotros</a>
									</li>
									<li class="uppercase">
										<a href="#" class="relative block py-3 px-2 lg:p-6 text-sm lg:text-xl">Contacto</a>
									</li>
								</ul>
								<div class="hidden md:block order-1 md:order-2" id="form">
									<ul class="flex flex-row justify-end items-center">
										<li>
											<form action="" method="get" class="w-full mr-3">
												<input type="text" name="search" class="border border-t-2 border-cdsolec-green-light pt-2 pb-2.5 w-24 md:w-auto rounded-md  my-1 text-gray-600 rounded-br-none rounded-tr-none" placeholder="Buscar"><button class="py-3 px-4 bg-cdsolec-green-light text-white rounded-r-md"><i class="fas fa-search "></i></button>
											</form>
										</li>
										<li x-data="{ isCart : false }">
											<button class="relative p-3 my-1 bg-cdsolec-green-light rounded-md" @click="isCart = !isCart" @keydown.escape="isCart = false" title="Cart">
												<i class="fas fa-shopping-cart fa-lg text-white text-xl"></i>
												<div class="animate-bounce absolute bg-cdsolec-green-dark top-2 right-1 rounded-lg">
													<span class="px-1 text-white  text-sm">1</span>
												</div>
											</button>
											<x-sumary-cart data=""></x-sumary-cart>
										</li>
									</ul>								
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</nav>
	</div> 
</header> 