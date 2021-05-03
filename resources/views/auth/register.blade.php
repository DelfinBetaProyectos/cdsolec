<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
              <x-jet-label for="first_name" value="{{ __('First Name') }}" />
              <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="identification" value="{{ __('Identification') }}" />
                <x-jet-input id="identification" class="block mt-1 w-full" type="text" name="identification" :value="old('identification')" required />
            </div>

            <div class="mt-4">
              <div class="block font-medium text-sm text-gray-700 mb-2">{{ __('Gender') }}</div>
              <label for="male" class="inline-flex items-center cursor-pointer mb-2">
                <input type="radio" id="male" name="gender" class="form-radio text-gray-800 w-5 h-5" value="M" />
                <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('Male') }}</span>
              </label>
              <label for="female" class="inline-flex items-center cursor-pointer mb-2">
                <input type="radio" id="female" name="gender" class="form-radio text-gray-800 w-5 h-5" value="F" />
                <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('Female') }}</span>
              </label>
              <label for="other" class="inline-flex items-center cursor-pointer mb-2">
                <input type="radio" id="other" name="gender" class="form-radio text-gray-800 w-5 h-5" value="O" />
                <span class="ml-2 text-sm font-semibold text-gray-800">{{ __('Other') }}</span>
              </label>
              <x-jet-input-error for="gender" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" pattern="^\(\d{3}\)-\d{3}-\d{4}$" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>

    <script>
    (function() {
      'use strict';

      let phone = document.getElementById('phone');

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
</x-guest-layout>
