<x-web-layout title="Soluciones">
	@section('background', asset('img/slide1.jpg'))

	@section('content')
    <div class="container mx-auto px-6">
			<h6 class="text-sm uppercase font-semibold tracking-widest text-blue-800">
				Soluciones para la gestión de la energía eléctrica, automatización, digitalización y su conectividad.
			</h6>
			<h2 class="text-3xl leading-tight font-bold mt-4">{{ $solutions->name }}</h2>
			{!! $solutions->description !!}
    </div>
	@endsection
</x-web-layout>