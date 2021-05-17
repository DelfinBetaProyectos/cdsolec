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
        <li><span class="mx-2">/</span>Agregar Usuario</li>
      </ol>
    </nav>

    <div class="flex flex-wrap justify-center">
      <div class="w-full lg:w-3/4 shadow rounded-md overflow-hidden bg-white">
        <div class="mx-4 mt-5 text-sm text-red-800 p-2 rounded bg-red-300 border border-red-800 
          {{ ($errors->any()) ? 'block' : 'hidden' }}">
          <x-jet-validation-errors class="mb-4" />
        </div>
  
        <form id="form-create" name="form-create" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
          @csrf
  
          <div class="px-4 py-5 grid gap-3 grid-cols-1 md:grid-cols-2">
            <!-- First Name -->
            <div class="w-full">
              <x-jet-label for="first_name" value="{{ __('session.First_Name') }}" />
              <x-jet-input type="text" id="first_name" name="first_name" :value="old('first_name')" autocomplete="first_name" required />
              <x-jet-input-error for="first_name" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="w-full">
              <x-jet-label for="last_name" value="{{ __('session.Last_Name') }}" />
              <x-jet-input type="text" id="last_name" name="last_name" :value="old('last_name')" required />
              <x-jet-input-error for="last_name" class="mt-2" />
            </div>

            <!-- Identification -->
            <div class="w-full">
              <x-jet-label for="identification" value="{{ __('session.Identification') }}" />
              <div class="relative rounded shadow-sm">
                <div class="absolute inset-y-0 flex items-center">
                  <select id="letter" name="letter" class="form-select h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm sm:leading-5" required>
                    <option value="V" {{ (old('letter') == 'V') ? 'selected' : '' }}>V</option>
                    <option value="E" {{ (old('letter') == 'E') ? 'selected' : '' }}>E</option>
                    <option value="J" {{ (old('letter') == 'J') ? 'selected' : '' }}>J</option>
                    <option value="G" {{ (old('letter') == 'G') ? 'selected' : '' }}>G</option>
                  </select>
                </div>
                <x-jet-input type="text" id="number" name="number" :value="old('number')" placeholder="Cédula o RIF" class="pl-11 w-full" required />
              </div>
              <x-jet-input type="hidden" id="identification" name="identification" :value="old('identification')" />
              <x-jet-input-error for="identification" class="mt-2" />
            </div>

            <!-- Gender -->
            <div class="w-full">
              <div class="block font-medium text-sm text-gray-700 mb-2">{{ __('session.Gender') }}</div>
              <label for="male" class="inline-flex items-center cursor-pointer mb-2">
                <input type="radio" id="male" name="gender" class="form-radio text-gray-800 w-5 h-5" value="M" wire:model.defer="state.gender" {{ (old('gender') == 'M') ? 'checked' : '' }} />
                <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('session.Male') }}</span>
              </label>
              <label for="female" class="inline-flex items-center cursor-pointer mb-2">
                <input type="radio" id="female" name="gender" class="form-radio text-gray-800 w-5 h-5" value="F" wire:model.defer="state.gender" {{ (old('gender') == 'F') ? 'checked' : '' }} />
                <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('session.Female') }}</span>
              </label>
              <label for="other" class="inline-flex items-center cursor-pointer mb-2">
                <input type="radio" id="other" name="gender" class="form-radio text-gray-800 w-5 h-5" value="O" wire:model.defer="state.gender" {{ (old('gender') == 'O') ? 'checked' : '' }} />
                <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('session.Other') }}</span>
              </label>
              <x-jet-input-error for="gender" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="w-full">
              <x-jet-label for="email" value="{{ __('session.Email') }}" />
              <x-jet-input type="email" id="email" name="email" class="mt-1 block w-full" :value="old('email')" required />
              <x-jet-input-error for="email" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="w-full">
              <x-jet-label for="phone" value="{{ __('session.Phone') }}" />
              <x-jet-input type="text" id="phone" name="phone" class="mt-1 block w-full" :value="old('phone')" pattern="^\(\d{3}\)-\d{3}-\d{4}$" />
              <x-jet-input-error for="phone" class="mt-2" />
            </div>

            <div class="w-full">
              <x-jet-label for="password" value="{{ __('auth.Password') }}" />
              <x-jet-input id="password" type="password" name="password" class="mt-1 block w-full" required />
              <x-jet-input-error for="password" class="mt-2" />
            </div>
      
            <div class="w-full">
              <x-jet-label for="password_confirmation" value="{{ __('auth.Confirm_Password') }}" />
              <x-jet-input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full" required />
              <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>

            <div class="md:col-span-2">
              <hr />
            </div>
  
            <fieldset>
              <legend class="block font-medium text-sm text-gray-700 mb-2">Rol:</legend>
              @foreach($roles as $role)
                <label for="role{{ $role->id }}" class="inline-flex items-center cursor-pointer mb-2">
                  <input type="radio" id="role{{ $role->id }}" name="role" class="form-radio text-blue-600 w-5 h-5" value="{{ $role->name }}" {{ old('role') == $role->name ? 'checked' : '' }} />
                  <span class="ml-2 text-sm font-semibold text-gray-800">{{ $role->title }}</span>
                </label>
              @endforeach
              <x-jet-input-error for="role" class="mt-2" />
            </fieldset>
          </div>
  
          <div class="flex items-center justify-end px-4 py-3 bg-gray-200 text-right sm:px-6">
            <x-jet-button class="text-sm">
              <i class="fas fa-fw fa-save"></i> Agregar
            </x-jet-button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      (function() {
        'use strict';

        let datePicker1 = flatpickr(".flatpickrDate1", {
          dateFormat: "d/m/Y",
          wrap: true,
          disableMobile: true
        });

        let datePicker2 = flatpickr(".flatpickrDate2", {
          dateFormat: "d/m/Y",
          wrap: true,
          disableMobile: true
        });

        let phone = document.getElementById('phone');
        let identification = document.getElementById('identification');
        let letter = document.getElementById('letter');
        let number = document.getElementById('number');

        function formatTlf(e) {
          if((this.value.length < 15) && ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode > 95 && e.keyCode < 106))) {
            this.value = this.value.replace(/\(?(\d{3})\)?\-?(\d{3})\-?/, '($1)-$2-');
          } else {
            this.value = this.value.slice(0, -1);
          }
        }

        phone.addEventListener('keyup', formatTlf);

        number.addEventListener('change', function() {
          identification.value = letter.value + number.value;
        }, false);
      })();
    </script>
  @endpush
</x-dashboard-layout>