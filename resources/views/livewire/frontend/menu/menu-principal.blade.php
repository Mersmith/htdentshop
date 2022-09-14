<header class="contenedor_navbar" x-data="sidebar()">
    @php
    $saludo = 'Hola como estan'; @endphp
    <!-- NAVBAR -->
    <nav class="navbar">
        <!-- HAMBURGUESA -->
        <div x-on:click="show()" class="contenedor_hamburguesa icono_hamburguesa">
            <!-- <img class="icono_hamburguesa icono" src="{{ asset('Inicio/imagenes/icono-hamburguesa.svg') }}" alt="" />-->
            <x-icono-hamburguesa ancho="35" />
        </div>
        <!-- LOGO -->
        <div class="contenedor_logo">
            <a href="{{ route('inicio') }}">
                <img src="{{ asset('Inicio/imagenes/logo.png') }}" alt="" />
            </a>
        </div>
        <!-- MENU -->
        <div :class="{ 'block': abierto, 'block': !abierto }" class="contenedor_menu_link">
            <div class="sidebar_logo">
                <img src="{{ asset('Inicio/imagenes/logo.png') }}" alt="" />
                <img x-on:click="close()" class="icono_cerrar icono"
                    src="{{ asset('Inicio/imagenes/icono-cerrar.svg') }}" alt="" />
            </div>
            <!-- MENU-PRINCIPAL -->
            <x-menu-principal-links :categorias="$categorias" />
        </div>
        <div class="contenedor_iconos">
            {{-- <img class="icono_ecommerce" src="{{ asset('Inicio/imagenes/icono-favorito.svg') }}" alt="" /> --}}
            @auth
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                    alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Administrar cuenta') }}
                            </div>

                            @role('admin')
                                <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                    Administrador
                                </x-jet-dropdown-link>
                            @endrole

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('orden.index') }}">
                                Mis ordenes
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Cerrar') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        {{-- <img class="icono_ecommerce" src="{{ asset('Inicio/imagenes/icono-usuario.svg') }}" alt="" /> --}}
                        <i class="fa-solid fa-user" style="color: #666666;"></i>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Entrar') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Registrar') }}
                        </x-jet-dropdown-link>
                    </x-slot>

                </x-jet-dropdown>

            @endauth
            <i class="fa-solid fa-heart" style="color: #f49f47;"></i>

            {{-- <img class="icono_ecommerce" src="{{ asset('Inicio/imagenes/icono-carrito.svg') }}" alt="" /> --}}
            @livewire('frontend.menu.menu-carrrito')
        </div>
    </nav>

</header>

<script>
    // x-on:click.away="abierto=false"
    function sidebar() {
        return {
            abierto: false,
            show() {
                if (this.abierto) {
                    //Se cierra el menu
                    this.abierto = false;
                    document.querySelector(".contenedor_menu_link").style.left = "-100%";
                } else {
                    //Se abre el menu
                    this.abierto = true;
                    document.querySelector(".contenedor_menu_link").style.left = "0";
                }
            },
            close() {
                this.abierto = false;
                document.querySelector(".contenedor_menu_link").style.left = "-100%";
            }
        }
    }
</script>
