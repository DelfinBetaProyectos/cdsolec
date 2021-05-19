<div class="px-4 py-5 grid gap-3 grid-cols-1">
  <div class="relative w-full mb-3">
    <x-jet-label for="name" value="{{ __('* Nombre') }}" />
    <x-jet-input id="name" type="text" name="name" :value="old('name', $category->name)" placeholder="Nombre" required autofocus autocomplete="name" />
    <x-jet-input-error for="name" class="mt-2" />
  </div>
</div>

<div class="flex items-center justify-end px-4 py-3 bg-gray-100 text-right sm:px-6">
  <x-jet-button>{{ ($category->name) ? __('Actualizar') : __('Guardar') }}</x-jet-button>
</div>
