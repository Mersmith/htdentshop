<header class="contenedor_navbar">

    <!-- NAVBAR -->
    <nav class="navbar">
        <!-- HAMBURGUESA -->
        <div class="contenedor_hamburguesa">
            <!-- <img class="icono_hamburguesa icono" src="{{ asset('Inicio/imagenes/icono-hamburguesa.svg') }}" alt="" />-->
            <x-icono-hamburguesa ancho="35" />
        </div>
        <!-- LOGO -->
        <div class="contenedor_logo">
            <a href="#">
                <img src="{{ asset('Inicio/imagenes/logo.png') }}" alt="" />
            </a>
        </div>
        <!-- MENU -->
        <div class="contenedor_menu_link">
            <div class="sidebar_logo">
                <img src="{{ asset('Inicio/imagenes/logo.png') }}" alt="" />
                <img class="icono_cerrar icono" src="{{ asset('Inicio/imagenes/icono-cerrar.svg') }}" alt="" />
            </div>
            <!-- MENU-PRINCIPAL -->
            <ul class="menu_principal">
                <!-- INICIO -->
                <li><a href="#">Inicio</a></li>
                <!-- Equipos intraorales -->
                <li>
                    <div class="menu_icono">
                        <a href="#">Equipos intraorales</a>
                        <img class="icono-rotacion-arriba icono" src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}"
                            alt="" />
                    </div>
                    <!-- SUBMENU-1 -->
                    <ul class="submenu_1 submenu_1_activo">
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Rayos x Portatil</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li><a href="#">Rextar</a></li>
                                <li><a href="#">Nanoray</a></li>
                                <li><a href="#">VSI</a></li>
                            </ul>
                        </li>
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Sensor RVG</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">EzSensor</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">1,5</a></li>
                                        <li><a href="#">2</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">Remedi</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">PDX-1000</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Digitalizador Intraoral</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li><a href="#">Cruxcan</a></li>
                            </ul>
                        </li>
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Escaneador Intraoral</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li><a href="#">EzScan</a></li>
                                <li><a href="#">I500</a></li>
                                <li><a href="#">I700</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Equipos extraorales -->
                <li>
                    <div class="menu_icono">
                        <a href="#">Equipos extraorales</a>
                        <img class="icono-rotacion-arriba icono" src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}"
                            alt="" />
                    </div>
                    <!-- SUBMENU-1 -->
                    <ul class="submenu_1 submenu_1_activo">
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Vatech</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">2D</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">Pax - i SC</a></li>
                                        <li><a href="#">Pax-i</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">3D</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">A9</a></li>
                                        <li><a href="#">Green X</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Pointnix</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">2D</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">Point 200</a></li>
                                        <li><a href="#">Point 500</a></li>
                                        <li><a href="#">Point 800S HD</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">3D</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">Point 500S</a></li>
                                        <li><a href="#">Point 800S HD 3d</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- Implantes -->
                <li>
                    <div class="menu_icono">
                        <a href="#">Implantes</a>
                        <img class="icono-rotacion-arriba icono" src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}"
                            alt="" />
                    </div>
                    <!-- SUBMENU-1 -->
                    <ul class="submenu_1 submenu_1_activo">
                        <!-- Point Implant -->
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Point Implant </a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li><a href="#">Implantes</a></li>
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">Accesorios</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">CEMENTED ABUTMENT</a></li>
                                        <li><a href="#">Angled Abutment-Regular</a></li>
                                        <li><a href="#">Kit quirurgico</a></li>
                                        <li><a href="#">healing</a></li>
                                        <li><a href="#">transfer</a></li>
                                        <li><a href="#">analogo</a></li>
                                        <li><a href="#">pilar temporal</a></li>
                                        <li><a href="#">CCM Abutment</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- Megagen -->
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Megagen</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <!-- Anyone -->
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">Anyone</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">Implantes</a></li>
                                        <li>
                                            <div class="menu_icono">
                                                <a href="#">Accesorios</a>
                                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}"
                                                    alt="" />
                                            </div>
                                            <!-- SUBMENU-4 -->
                                            <ul class="submenu_4 submenu_4_activo">
                                                <li><a href="#">Lab Analog</a></li>
                                                <li><a href="#">Impresssion coping</a></li>
                                                <li><a href="#">Ez post (Pilar Recto)</a></li>
                                                <li><a href="#">Angled Abutment</a></li>
                                                <li><a href="#">Kit quirurgico</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- AnyRidge -->
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">AnyRidge</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">Implantes</a></li>
                                        <li>
                                            <div class="menu_icono">
                                                <a href="#">Accesorios</a>
                                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}"
                                                    alt="" />
                                            </div>
                                            <!-- SUBMENU-4 -->
                                            <ul class="submenu_4 submenu_4_activo">
                                                <li><a href="#">Lab Analog</a></li>
                                                <li><a href="#">CCM Abutment</a></li>
                                                <li><a href="#">Impression coping</a></li>
                                                <li><a href="#">Healing abutment</a></li>
                                                <li><a href="#">Angled abutment</a></li>
                                                <li><a href="#">Ez post</a></li>
                                                <li><a href="#">Kit quirurgico</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Mini -->
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">Mini</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">Implantes</a></li>
                                        <li>
                                            <div class="menu_icono">
                                                <a href="#">Accesorios</a>
                                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}"
                                                    alt="" />
                                            </div>
                                            <!-- SUBMENU-4 -->
                                            <ul class="submenu_4 submenu_4_activo">
                                                <li><a href="#">Ez post</a></li>
                                                <li><a href="#">Angled abutment</a></li>
                                                <li><a href="#">Impression coping</a></li>
                                                <li><a href="#">Lab Analog</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <!-- Kuwotech -->
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Kuwotech</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li><a href="#">Implantes</a></li>
                                <li>
                                    <div class="menu_icono">
                                        <a href="#">Accesorios</a>
                                        <img class="sub-sub-menu icono icono-rotacion-derecha"
                                            src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                                    </div>
                                    <!-- SUBMENU-3 -->
                                    <ul class="submenu_3 submenu_3_activo">
                                        <li><a href="#">ANGLED ABUTMENT</a></li>
                                        <li><a href="#">FINE ABUTMENT</a></li>
                                        <li><a href="#">HEALING ABUTMENT</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </li>
                <!-- Materiales -->
                <li>
                    <div class="menu_icono">
                        <a href="#">Materiales</a>
                        <img class="icono-rotacion-arriba icono" src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}"
                            alt="" />
                    </div>
                    <!-- SUBMENU-1 -->
                    <ul class="submenu_1 submenu_1_activo">
                        <li class="lista_menu_productos">
                            <div class="menu_icono">
                                <a href="#">Zirconia</a>
                                <img class="sub-sub-menu icono icono-rotacion-derecha"
                                    src="{{ asset('Inicio/imagenes/icono-abajo.svg') }}" alt="" />
                            </div>
                            <!-- SUBMENU-2 -->
                            <ul class="submenu_2 submenu_2_activo">
                                <li><a href="#">PERFIT ZR HT</a></li>
                                <li><a href="#">PERFIT ZR UT</a></li>
                                <li><a href="#">PERFIT ZR TS-MULTILAYER</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="contenedor_iconos">
            <img class="icono_ecommerce" src="{{ asset('Inicio/imagenes/icono-favorito.svg') }}" alt="" />
            <div>
                @auth
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administrar cuenta') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
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
                            <img class="icono_ecommerce" src="{{ asset('Inicio/imagenes/icono-usuario.svg') }}"
                                alt="" />

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
            </div>
            <!-- <img class="icono_ecommerce" src="{{ asset('Inicio/imagenes/icono-carrito.svg') }}" alt="" />-->
            @livewire('menu-carrrito')
        </div>
    </nav>
</header>
