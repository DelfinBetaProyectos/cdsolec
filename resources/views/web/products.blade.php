<x-web-layout title="Productos">
	@section('background', asset('img/slide2.jpg'))

	@section('content')
    <div class="container mx-auto px-6">
			<h6 class="text-sm uppercase font-semibold tracking-widest text-blue-800">
				Soluciones a tu alcance
			</h6>
			<h2 class="text-3xl leading-tight font-bold mt-4">Productos</h2>

			@if ($category)
				<nav class="mb-3 px-3 py-2 rounded bg-gray-200 text-gray-600">
					<ol class="flex flex-wrap">
						<li><span class="text-cdsolec-green-dark">{{ $category->label }}</span></li>
						<li><span class="mx-2">/</span>Productos</li>
					</ol>
				</nav>

				@if (count($category->childs) > 0)
					<div class="mb-3 px-3 py-2 rounded-lg bg-cdsolec-green-dark text-white h-32 overflow-x-auto flex flex-col flex-wrap">
						@foreach($category->childs as $child)
							<a href="{{ route('products').'?category='.$child->id }}" class="block px-2 hover:text-cdsolec-green-light">
								<span class="fas fa-angle-right mr-1"></span>
								{{ $child->label }}
							</a>
						@endforeach
					</div>
				@endif
			@endif
			
      <p class="py-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum illo eius laudantium voluptas minus facere deserunt optio? A, nisi! Incidunt quia non ducimus beatae ab? Quibusdam, quidem suscipit? Qui, molestias! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum illo eius laudantium voluptas minus facere deserunt optio? A, nisi! Incidunt quia non ducimus beatae ab? Quibusdam, quidem suscipit? Qui, molestias!</p>
			<p class="py-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum illo eius laudantium voluptas minus facere deserunt optio? A, nisi! Incidunt quia non ducimus beatae ab? Quibusdam, quidem suscipit? Qui, molestias! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum illo eius laudantium voluptas minus facere deserunt optio? A, nisi! Incidunt quia non ducimus beatae ab? Quibusdam, quidem suscipit? Qui, molestias!</p>
    </div>
	@endsection
</x-web-layout>