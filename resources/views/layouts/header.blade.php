<header class="header w-full z-50 bg-green-600 md:bg-cdsolec-green01">
	<div class="border-t border-b border-gray-300 text-xs md:text-sm">
		<nav class="flex-wrap">
			<div class="container mx-auto">
				<div class="flex ">
					<div class="">
						<a href="/">
							<img src="{{ asset('img/Logos/Logo-CD-SOLEC-Blanco.png') }}" alt="logo" class="h-30 w-32 mt-2">
						</a>
					</div>
					<div class="w-full ml-2">
						<div class="">
							<div class="block md:hidden grid grid-cols-2">
								<div class="justify-self-start">
									<button class="py-3 px-3 bg-gray-200 text-black rounded-md hover:text-blue-400" onclick="openNavItem(event,'us')">
										<i class="fas fa-bars"></i>
									</button>
								</div>		
								<div class="justify-self-end">
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
									<ul class="flex flex-col md:flex-row list-none mt-1">
										<li class="px-2 py-1 border-l border-r border-gray-300 divide-x divide-gray-300 bg-gray-200">	
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
										<li class="px-2 py-1 px-2 py-1 border-l border-r border-gray-300 divide-x divide-gray-300 bg-gray-200">
											<i class="fas fa-phone"></i> 0243 000.00.00
										</li>
									</ul>
								</div>
								<div class="hidden md:block col-span-2 md:col-span-1" id="login">
									<div class="flex justify-end flex-col md:flex-row list-none mt-1">
											<a href="{{ route('register') }}" class="ml-auto md:ml-0 w-1/4 md:w-auto border-l border-r border-gray-300 divide-x divide-gray-300 mx-1 p-1 bg-gray-200 text-black hover:text-blue-400" title="Registro">
												<i class="fas fa-user"></i> Registro
											</a>	
											<a href="{{ route('login') }}" class="ml-auto md:ml-0 w-1/4 md:w-auto border-l border-r border-gray-300 divide-x divide-gray-300 mx-1 p-1 bg-gray-200 text-black hover:text-blue-400" title="Iniciar Sección">
												<i class="fas fa-sign-in-alt"></i> Login
											</a>	
									</div>
								</div>
							</div>
						</div>
						<hr class="mt-4 mb-3 hidden md:block">
						<div class="grid gap-4 grid-cols-2 md:grid-cols-4">	
							<div class="hidden md:block col-span-2 mt-auto" id="us">
								<ul class="flex flex-col md:flex-row list-none items-center md:justify-between justify-center mb-auto">
									<li class="p-4 uppercase">
										<a href="" class=" transition-all ease-out duration-700 hover:text-blue-400" title="Nosotros">Nosotros</a>
									</li>
									<li class="p-4 uppercase">
										<a href="" class="transition-all ease-out duration-700 hover:text-blue-400" title="Contactos">Contactos</a>
									</li>
									<li class="p-4 uppercase">
										<a href="" class="border-b border-cdsolec-green01 hover:border-b hover:border-blue-400 transition-all ease-out duration-700 hover:text-blue-400" title="item 3">item 3</a>
									</li>
								</ul>
							</div>
							<div class="hidden md:block col-span-2" id="form">
								<ul class="flex flex-row justify-end items-center">
									<li>
										<form action="" method="get" class="w-full mr-3">
											<input type="text" name="search" class="border border-gray-300 pt-2 pb-2.5 px-3 md:w-80 w-40 rounded-md shadow-sm  my-1 text-gray-600" placeholder="Buscar">
											<button class="py-3 px-4 bg-yellow-400 text-white rounded-r-md"><i class="fas fa-search"></i></button>
										</form>
										
									</li>
									<li x-data="{ isCart : false }">
										<button class="relative p-3 mb-1 bg-gray-400 hover:text-blue-400 hover:bg-gray-300" @click="isCart = !isCart" @keydown.escape="isCart = false" title="Cart">
											<i class="fas fa-shopping-cart fa-lg">
											</i>
											<div class="animate-bounce absolute bg-cdsolec-green02 top-2 right-1 rounded-lg" style="border: 1px solid #EE1C24;">
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
		</nav>
	</div>
</header><!-- /header -->