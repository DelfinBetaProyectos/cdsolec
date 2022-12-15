<x-jet-form-section submit="updateProfileInformation">
  <x-slot name="title">
    {{ __('session.Profile_Information') }}
  </x-slot>

  <x-slot name="description">
    {{ __('session.Profile_msg') }}
  </x-slot>

  <x-slot name="form">
    <!-- Profile Photo -->
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
      <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
        <!-- Profile Photo File Input -->
        <input type="file" class="hidden"
                    wire:model="photo"
                    x-ref="photo"
                    x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);" />

        <x-jet-label for="photo" value="{{ __('Photo') }}" />

        <!-- Current Profile Photo -->
        <div class="mt-2" x-show="! photoPreview">
          <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview">
          <span class="block rounded-full w-20 h-20"
                x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
          </span>
        </div>

        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
          {{ __('session.Select_Photo') }}
        </x-jet-secondary-button>

        @if ($this->user->profile_photo_path)
          <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
            {{ __('session.Remove_Photo') }}
          </x-jet-secondary-button>
        @endif

        <x-jet-input-error for="photo" class="mt-2" />
      </div>
    @endif

    <!-- First Name -->
    <div class="col-span-6 sm:col-span-3">
      <x-jet-label for="firstname" value="{{ __('session.First_Name') }}" />
      <x-jet-input id="firstname" type="text" class="mt-1 block w-full" wire:model.defer="state.firstname" autocomplete="firstname" required />
      <x-jet-input-error for="firstname" class="mt-2" />
    </div>

    <!-- Last Name -->
    <div class="col-span-6 sm:col-span-3">
      <x-jet-label for="lastname" value="{{ __('session.Last_Name') }}" />
      <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="state.lastname" required />
      <x-jet-input-error for="lastname" class="mt-2" />
    </div>

    <!-- Identification -->
    <div class="col-span-6 sm:col-span-3">
      <x-jet-label for="identification" value="{{ __('session.Identification') }}" />
      <x-jet-input id="identification" type="text" class="mt-1 block w-full" wire:model.defer="state.identification" autocomplete="identification" />
      <x-jet-input-error for="identification" class="mt-2" />
    </div>

    <!-- Gender -->
    <div class="col-span-6 sm:col-span-3">
      <div class="block font-medium text-sm text-gray-700 mb-2">{{ __('session.Gender') }}</div>
      <label for="male" class="inline-flex items-center cursor-pointer mb-2">
        <input type="radio" id="male" name="gender" class="w-5 h-5 border border-cdsolec-green-dark text-cdsolec-green-dark shadow-sm focus:border-cdsolec-green-dark focus:ring focus:ring-cdsolec-green-light focus:ring-opacity-50" value="M" wire:model.defer="state.gender" {{ (Auth::user()->gender == 'M') ? 'checked' : '' }} />
        <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('session.Male') }}</span>
      </label>
      <label for="female" class="inline-flex items-center cursor-pointer mb-2">
        <input type="radio" id="female" name="gender" class="w-5 h-5 border border-cdsolec-green-dark text-cdsolec-green-dark shadow-sm focus:border-cdsolec-green-dark focus:ring focus:ring-cdsolec-green-light focus:ring-opacity-50" value="F" wire:model.defer="state.gender" {{ (Auth::user()->gender == 'F') ? 'checked' : '' }} />
        <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('session.Female') }}</span>
      </label>
      <label for="other" class="inline-flex items-center cursor-pointer mb-2">
        <input type="radio" id="other" name="gender" class="w-5 h-5 border border-cdsolec-green-dark text-cdsolec-green-dark shadow-sm focus:border-cdsolec-green-dark focus:ring focus:ring-cdsolec-green-light focus:ring-opacity-50" value="O" wire:model.defer="state.gender" {{ (Auth::user()->gender == 'O') ? 'checked' : '' }} />
        <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('session.Other') }}</span>
      </label>
      <x-jet-input-error for="gender" class="mt-2" />
    </div>

    <!-- Email -->
    <div class="col-span-6 sm:col-span-3">
      <x-jet-label for="email" value="{{ __('session.Email') }}" />
      <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
      <x-jet-input-error for="email" class="mt-2" />
    </div>

    <!-- Phone -->
    <div class="col-span-6 sm:col-span-3">
      <x-jet-label for="user_mobile" value="{{ __('session.Phone') }}" />
      <x-jet-input id="user_mobile" type="text" class="mt-1 block w-full" wire:model.defer="state.user_mobile" pattern="^\(\d{3}\)-\d{3}-\d{4}$" />
      <x-jet-input-error for="user_mobile" class="mt-2" />
    </div>
  </x-slot>

  <x-slot name="actions">
    <x-jet-action-message class="mr-3" on="saved">
      {{ __('session.Profile_Saved') }}
    </x-jet-action-message>

    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
      <i class="fas fa-fw fa-save"></i> {{ __('session.Save') }}
    </x-jet-button>
  </x-slot>
</x-jet-form-section>

@push('scripts')
  <script>
    (function() {
      'use strict';

      let phone = document.getElementById('user_mobile');

      function formatTlf(e) {
        if((this.value.length < 15) && ((e.keyCode > 47 && e.keyCode < 58) || (e.keyCode > 95 && e.keyCode < 106))) {
          this.value = this.value.replace(/\(?(\d{3})\)?\-?(\d{3})\-?/, '($1)-$2-');
        } else {
          this.value = this.value.slice(0, -1);
        }
      }

      phone.addEventListener('keyup', formatTlf);
    })();
  </script>
@endpush
