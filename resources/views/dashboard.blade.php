<x-dashboard-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto mb-14 mt-6 lg:mt-8 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
      <x-jet-welcome />
    </div>
  </div>
</x-dashboard-layout>
