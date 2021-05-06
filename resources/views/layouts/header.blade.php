<header class="header z-10">
	<div class="border-t border-b border-gray-300 text-xs md:text-sm">
		<nav class="bg-green-300 flex-wrap">
			<div class="container mx-auto">
				<div class="flex ">
					<div class="">
						<a href="/">
							<img src="{{ asset('img/l-mercatil.png') }}" alt="logo" class="h-30 w-32">
						</a>
					</div>
					<div class="w-full">
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
											<a href="{{ route('register') }}" class="ml-auto md:ml-0 w-1/4 md:w-auto border-l border-r border-gray-300 divide-x divide-gray-300 mx-1 p-1 bg-gray-200 text-black hover:text-blue-400">
												<i class="fas fa-user"></i> Registro
											</a>	
											<a href="{{ route('login') }}" class="ml-auto md:ml-0 w-1/4 md:w-auto border-l border-r border-gray-300 divide-x divide-gray-300 mx-1 p-1 bg-gray-200 text-black hover:text-blue-400">
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
										<a href="" class="border-b border-green-300 hover:border-b hover:border-gray-600 transition-all ease-out duration-700 hover:text-yellow-200">Nosotros</a>
									</li>
									<li class="p-4 uppercase">
										<a href="" class="border-b border-green-300 hover:border-b hover:border-gray-600 transition-all ease-out duration-700 hover:text-yellow-200">Contactos</a>
									</li>
									<li class="p-4 uppercase">
										<a href="" class="border-b border-green-300 hover:border-b hover:border-gray-600 transition-all ease-out duration-700 hover:text-yellow-200">item 3</a>
									</li>
								</ul>
							</div>
							<div class="hidden md:block col-span-2" id="form">
								<ul class="flex flex-col md:flex-row justify-end items-center">
									<li>
										<form action="" method="get" class="w-full mr-3">
											<input type="text" name="search" class="border border-gray-300 pt-2 pb-2.5 px-3 md:w-80 w-40 rounded-md shadow-sm  my-1 text-gray-600" placeholder="Buscar">
											<button class="py-3 px-4 bg-yellow-400 text-white rounded-r-md"><i class="fas fa-search"></i></button>
										</form>
										
									</li>
									<li>
										<button class="px-3 py-2 mb-1">
											<i class="fas fa-shopping-cart fa-lg">
											</i>
										</button>									
									</li>
								</ul>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
	<script type="text/javascript">/*
		window.onscroll = function() {
		  var y = window.scrollY;
		  console.log(y);
		};
		document.querySelector('#prueba #id3.clase')*/

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
</header><!-- /header -->