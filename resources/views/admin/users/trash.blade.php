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
        <li><span class="mx-2">/</span>Papelera de Usuarios</li>
      </ol>
    </nav>
    
    <div id="message" class="my-3 px-3 py-2 rounded border border-green-600 bg-green-200 text-green-600 text-sm font-bold" {{ (!session()->has('message')) ? 'hidden' : '' }}>
      {{ session()->has('message') ? session()->get('message') : '' }}
    </div>

    <table class="my-3 w-full rounded-lg overflow-hidden shadow-md">
      <thead>
        <tr class="hidden lg:table-row bg-cdsolec-green-dark text-white text-sm leading-4 uppercase tracking-wider">
          <th class="px-3 py-3 font-medium text-left">
            Nombre
          </th>
          <th class="px-2 py-3 font-medium text-left">
            Email
          </th>
          <th style="width: 150px" class="px-2 py-3 font-medium text-center">
            Rol
          </th>
          <th style="width: 110px" class="px-2 py-3 font-medium text-center">
            Fecha
          </th>
          <th style="width: 120px" class="px-3 py-3 font-medium text-center">
            Opciones
          </th>
        </tr>
      </thead>
      @if ($users->isNotEmpty())
        <tbody class="w-full flex-1 sm:flex-none bg-white divide-y divide-gray-400 text-sm leading-5">
          @foreach($users as $user)
            <tr class="flex flex-col lg:table-row even:bg-gray-200">
              <td class="flex flex-row lg:table-cell">
                <div class="p-2 w-32 lg:hidden bg-cdsolec-green-dark font-medium text-white text-sm leading-4 uppercase tracking-wider">
                  Nombre
                </div>
                <div class="p-2 flex items-center">
                  {{-- <div class="flex-shrink-0 h-10 w-10 mr-4">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60" alt="">
                  </div> --}}
                  <div>
                    <div class="text-sm leading-5 font-semibold">{{ $user->fullName }}</div>
                    <div class="text-sm leading-5 text-gray-600">{{ $user->identification }}</div>
                  </div>
                </div>
              </td>
              <td class="flex flex-row lg:table-cell">
                <div class="p-2 w-32 lg:hidden bg-cdsolec-green-dark font-medium text-white text-sm leading-4 uppercase tracking-wider">
                  Email
                </div>
                <div class="p-2">
                  {{ $user->email }}
                </div>
              </td>
              <td class="flex flex-row lg:table-cell">
                <div class="p-2 w-32 lg:hidden bg-cdsolec-green-dark font-medium text-white text-sm leading-4 uppercase tracking-wider">
                  Rol
                </div>
                <div class="p-2 text-center">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-500 text-gray-200">
                    {{ ($user->roles()->pluck('title')->count() > 0) ? $user->roles()->pluck('title')[0] : '---' }}
                  </span>
                </div>
              </td>
              <td class="flex flex-row lg:table-cell">
                <div class="p-2 w-32 lg:hidden bg-cdsolec-green-dark font-medium text-white text-sm leading-4 uppercase tracking-wider">
                  Fecha
                </div>
                <div class="p-2 text-center">
                  {{ $user->created_at->format('d/m/Y') }}
                </div>
              </td>
              <td class="flex flex-row lg:table-cell">
                <div class="p-2 w-32 lg:hidden bg-cdsolec-green-dark font-medium text-white text-sm leading-4 uppercase tracking-wider">
                  Opciones
                </div>
                <div class="p-2 text-center">
                  <a href="{{ route('users.restore', $user->id) }}" class="px-3 py-2 font-semibold uppercase text-sm text-white bg-blue-600 hover:bg-blue-500 tracking-wider rounded-md transition">
                    <i class="fas fa-fw fa-sm fa-undo"></i>
                  </a>
                  @livewire('destroy-modal', ['model' => 'Usuario', 'model_id' => $user->id])
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      @endif
    </table>

    {{ $users->links() }}
  </div>
</x-dashboard-layout>