<header class="header z-10">
	<div class="border-t border-b border-gray-300 text-xs md:text-sm">
		<div class="container mx-auto flex-wrap justify-between">
			<div class="flex flex-wrap flex-justify-start border-l border-r border-gray-300 divide-x divide-gray-300">
				<div class="px-2 py-1">
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
				</div>
				<div class="px-2 py-1 hidden md:block">
					<i class="fas fa-phone"></i> 0243 000.00.00
				</div>
			</div>
			<div class="flex flex-wrap flex-justify-end border-l border-r border-gray-300 divide-x divide-gray-300">
				<div class="px-2 py-1">
				</div>
			</div>
		</div>
		<nav class="bg-green-300 flex-wrap">
			<div class="container mx-auto">
				<div class="flex ">
					<div class="">
						<a href="/">
							<img src="" alt="logo" width="115" height="70">
						</a>
					</div>
					<div class="w-full">
						<div class="">
							<div>
								<div class="hidden">
									content icon
								</div>
								<div class="grid gap-4 grid-cols-2 md:grid-cols-4">
									<ul class="flex flex-wrap col-span-3">
										<li>item 1</li>
										<li>item 2</li>
										<li>item 3</li>
									</ul>
									<div class="col-span-1">
										<button><i class="fas fa-user"></i>login</button>
									</div>
								</div>
							</div>
						</div>
						<hr class="my-4">
						<div>
							sas
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
</header><!-- /header -->