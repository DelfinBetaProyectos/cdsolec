<x-dashboard-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-cdsolec-green-dark leading-tight uppercase">
      <i class="fas fa-users"></i> Usuarios
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto mb-14 mt-6 lg:mt-8 sm:px-6 lg:px-8">
    <nav class="mb-3 px-3 py-2 rounded bg-gray-200 text-gray-600">
      <ol class="flex flex-wrap">
        <li><a href="{{ route('dashboard') }}" class="text-cdsolec-green-dark"><i class="fas fa-home"></i></a></li>
        <li><span class="mx-2">/</span><a href="{{ route('users.index') }}" class="text-cdsolec-green-dark">Usuarios</a></li>
        <li><span class="mx-2">/</span>Actualizar Contraseña</li>
      </ol>
    </nav>

    <div class="flex flex-wrap justify-center">
      <div class="w-full lg:w-3/4 shadow rounded-md overflow-hidden bg-white">
        <div class="mx-4 mt-5 text-sm text-red-800 p-2 rounded bg-red-300 border border-red-800 
          {{ ($errors->any()) ? 'block' : 'hidden' }}">
          <x-jet-validation-errors class="mb-4" />
        </div>

        <form id="form-password" name="form-password" method="POST" action="{{ route('users.passwordUpdate', $user) }}">
          @csrf
          {{ method_field('PUT') }}
  
          <div class="px-4 py-5 grid gap-3 grid-cols-1 md:grid-cols-2">
            <div class="w-full col-span-2">
              <p class="uppercase"><i class="fas fa-user"></i> {{ $user->fullName }}</p>
            </div>
  
            <div class="w-full">
              <x-jet-label for="password" value="{{ __('session.New_Password') }}" />
              <x-jet-input id="password" type="password" name="password" required autocomplete="new-password" />
              <x-jet-input-error for="password" class="mt-2" />
            </div>
  
            <div class="w-full">
              <x-jet-label for="password_confirmation" value="{{ __('session.Confirm_Password') }}" />
              <x-jet-input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>
          </div>
  
          <div class="flex items-center justify-end px-4 py-3 bg-gray-100 text-right sm:px-6">
            <x-jet-button class="text-sm">
              <i class="fas fa-fw fa-lock"></i> {{ __('session.Update_Password') }}
            </x-jet-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-dashboard-layout>