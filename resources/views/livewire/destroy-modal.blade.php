<div class="inline-block">
  <button type="button" wire:click="confirmDestroy()" class="px-3 py-2 font-semibold uppercase text-sm text-white bg-red-600 hover:bg-red-500 tracking-wider rounded-md transition ml-2">
    <i class="fas fa-fw fa-sm fa-times"></i>
  </button>

  <!-- Delete User Confirmation Modal -->
  <x-jet-dialog-modal wire:model="open">
    <x-slot name="title">
      Confirmar Destrucción
    </x-slot>

    <x-slot name="content">
      ¿Estás seguro que deseas eliminar permanentemente {{ $model }}?
    </x-slot>

    <x-slot name="footer">
      <x-jet-secondary-button wire:click="$toggle('open')" wire:loading.attr="disabled">
        <i class="fas fa-fw fa-ban mr-2"></i> Cancelar
      </x-jet-secondary-button>

      <form method="post" action="{{ route($route, $model_id) }}" class="inline">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <button type="submit" class="px-3 py-2 font-semibold uppercase text-sm text-white bg-red-600 hover:bg-red-500 tracking-wider rounded-md transition ml-2">
          <i class="fas fa-fw fa-times mr-2"></i> Destruir
        </button>
      </form>
    </x-slot>
  </x-jet-dialog-modal>
</div>
