<nav x-data="{ open: false, openSide: true }" class="sticky top-0 z-20 bg-cdsolec-green-light">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <!-- Logo -->
      <div class="flex flex-shrink-0 flex items-center mr-10">
        <a href="{{ route('welcome') }}">
          <x-jet-application-mark class="block h-9 w-auto" />
        </a>
      </div>
      <!-- Navigation -->
      <div class="hidden w-full md:flex md:flex-col-reverse lg:flex-row justify-between">
        <!-- Navigation Links Left -->
        <div class="space-x-4 flex flex-shrink-0">
          <div class="hoverable flex flex-shrink-0">
            <x-jet-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
              Productos
            </x-jet-nav-link>
            <div class="p-6 mega-menu shadow-xl bg-white overflow-auto h-96">
              <div class="container mx-auto w-full">
                <div x-data="tabsMegaMenu()">
                  <ul class="flex justify-start items-center">
                    <template x-for="(tab, index) in tabs" :key="index">
                      <li class="cursor-pointer py-2 px-4 text-cdsolec-green-dark border-b-4 border-gray-400" :class="activeTab===index ? 'text-cdsolec-green-dark border-cdsolec-green-dark' : ''" @click="activeTab = index" x-text="tab"></li>
                    </template>
                  </ul>
                  
                  <!-- obtener datos desde la API-->
                  @php

                  $ch = curl_init();

                  curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type:application/json', 'DOLAPIKEY: bJD33zn72gC9O6duXc59vOZh2N8OFiFk' ) );
                  curl_setopt($ch, CURLOPT_URL, 'http://www.cd-solec.com/erp/htdocs/api/index.php/categories?sortfield=t.rowid&sortorder=ASC&limit=100&sqlfilters=fk_parent%3D0');
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($ch, CURLOPT_HEADER, 0);
                  $data = json_decode(curl_exec($ch),true);

                  curl_close($ch);

                  @endphp

                  <div class="pt-4 border-t border-gray-400">
                    <div x-show="activeTab===0">
                      <div class="grid gap-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($data as $item)
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          {{ $item['label']}}
                        </a>
                        @endforeach
                      </div>
                    </div>

                    <div x-show="activeTab===1">
                      <div class="grid gap-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Mercado 1
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Mercado 2
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Mercado 3
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Mercado 4
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Mercado 5
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Mercado 6
                        </a>
                      </div>
                    </div>
                    <div x-show="activeTab===2">
                      <div class="grid gap-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          ABB
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Emerson
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Fuji Electric
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Mitsubishi Electric
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Philips
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Phoenix Contact
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Rockwell Automation
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Schneider
                        </a>
                        <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                          <span class="fas fa-angle-right mr-1"></span>
                          Siemens
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
            Nosotros
          </x-jet-nav-link>
          <x-jet-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
            Contacto
          </x-jet-nav-link>
        </div>
        <!-- Navigation Links Right -->
        <div class="space-x-4 flex flex-shrink-0 justify-end">
          <x-jet-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')" class="relative">
            <i class="fas fa-fw mr-1 fa-shopping-cart"></i> Compra
            <div class="absolute animate-bounce bg-cdsolec-green-dark rounded -right-5 lg:top-2 lg:-right-2">
              <span class="px-2 text-white text-xs">0</span>
            </div>
          </x-jet-nav-link>
          <x-jet-nav-link href="{{ route('register') }}">
            <i class="fas fa-fw mr-1 fa-user"></i> Registro
          </x-jet-nav-link>
          <x-jet-nav-link href="{{ route('login') }}">
            <i class="fas fa-fw mr-1 fa-lock"></i> Login
          </x-jet-nav-link>
        </div>
      </div>
      <!-- Hamburger -->
      <div class="-mr-2 flex items-center md:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-cdsolec-green-dark focus:outline-none focus:bg-cdsolec-green-dark transition">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden border-t border-cdsolec-green-dark">
    <!-- Navigation Links Left -->
    <div class="border-b border-cdsolec-green-dark">
      <div class="hoverable">
        <x-jet-responsive-nav-link href="#" :active="request()->routeIs('products')">
          Productos
        </x-jet-responsive-nav-link>
        <div class="z-10 p-6 mega-menu shadow-xl bg-white overflow-auto h-96">
          <div class="container mx-auto w-full">
            <div x-data="tabsMegaMenu()">
              <ul class="flex justify-start items-center">
                <template x-for="(tab, index) in tabs" :key="index">
                  <li class="cursor-pointer py-2 px-4 text-cdsolec-green-dark border-b-4 border-gray-400" :class="activeTab===index ? 'text-cdsolec-green-dark border-cdsolec-green-dark' : ''" @click="activeTab = index" x-text="tab"></li>
                </template>
              </ul>

              <div class="pt-4 border-t border-gray-400">
                <div x-show="activeTab===0">
                  <div class="grid gap-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Distribución de la energía
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Controles industriales
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Automatización industrial
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Envolventes
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Redes de datos y comunicación
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Gestión y organización de cableado
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Canalizaciones eléctricas, data y comunicaciones
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Conductores eléctricos de baja tensión
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Calidad de energía
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Fuentes de energía
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Distribución de energía M.T.
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Iluminación tecnología LED
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Tomacorrientes e interruptores terminales
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Instrumentación electrónica
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Sistemas de control y actuación neumáticos
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Sistemas de inmotica y domotica. Soluciones de Building Automation
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Seguridad y control de acceso
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Detección y extinsion de incendio
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Seguridad industrial
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Soluciones integrales
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Soluciones para medios de fijación
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Herramientas
                    </a>
                  </div>
                </div>
                <div x-show="activeTab===1">
                  <div class="grid gap-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Mercado 1
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Mercado 2
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Mercado 3
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Mercado 4
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Mercado 5
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Mercado 6
                    </a>
                  </div>
                </div>
                <div x-show="activeTab===2">
                  <div class="grid gap-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      ABB
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Emerson
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Fuji Electric
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Mitsubishi Electric
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Philips
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Phoenix Contact
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Rockwell Automation
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Schneider
                    </a>
                    <a href="#" class="block mr-4 px-2 hover:bg-cdsolec-green-light">
                      <span class="fas fa-angle-right mr-1"></span>
                      Siemens
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <x-jet-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
        Nosotros
      </x-jet-responsive-nav-link>
      <x-jet-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
        Contacto
      </x-jet-responsive-nav-link>
    </div>

    <!-- Navigation Links Right -->
    <div class="border-b border-cdsolec-green-dark">
      <x-jet-responsive-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">
        <i class="fas fa-fw mr-1 fa-shopping-cart"></i>
        <span class="relative">Compra
          <div class="absolute animate-bounce bg-cdsolec-green-dark rounded bottom-0 -right-8">
            <span class="px-2 text-white text-xs">0</span>
          </div>
        </span>
      </x-jet-responsive-nav-link>
      <x-jet-responsive-nav-link href="{{ route('register') }}">
        <i class="fas fa-fw mr-1 fa-user"></i> Registro
      </x-jet-responsive-nav-link>
      <x-jet-responsive-nav-link href="{{ route('login') }}">
        <i class="fas fa-fw mr-1 fa-lock"></i> Login
      </x-jet-responsive-nav-link>
    </div>
  </div>
</nav>