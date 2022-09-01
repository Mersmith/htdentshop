<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $categoria->nombre }}</h1>
            <div class="hidden md:block grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                {{-- <p style="color: {{ $vista == 'grid' ? 'blue' : '' }} " wire:click="$set('vista', 'grid')">Cuadros</p> |
            <p style="color: {{ $vista == 'lista' ? 'blue' : '' }} " wire:click="$set('vista', 'lista')">Lista</p> --}}

                <i class="fas fa-border-all p-3 cursor-pointer {{ $vista == 'grid' ? 'blue' : '' }} "
                    wire:click="$set('vista', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $vista == 'lista' ? 'blue' : '' }} "
                    wire:click="$set('vista', 'lista')"></i>

            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2>Subcategorias:</h2>
            {{ $subcategoria }}
            <br>
            <ul>
                @foreach ($categoria->subcategorias as $subcategoriaData)
                    <li class="my-2 text-sm">
                        <a wire:click="$set('subcategoria', '{{ $subcategoriaData->nombre }}')"
                            style="color: {{ $subcategoria == $subcategoriaData->nombre ? 'red' : '' }}"
                            class="cursor-pointer hover:text-orange ">-
                            {{ $subcategoriaData->nombre }}</a>
                    </li>
                @endforeach
            </ul>
            <h2>Marcas:</h2>
            {{ $marca }}
            <br>
            <ul>
                @foreach ($categoria->marcas as $marcaData)
                    <li class="my-2 text-sm">
                        <a wire:click="$set('marca', '{{ $marcaData->nombre }}')"
                            style="color: {{ $marca == $marcaData->nombre ? 'red' : '' }}"
                            class="cursor-pointer hover:text-orange">-
                            {{ $marcaData->nombre }}</a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button wire:click="limpiarFiltro">
                Eliminar Filtros
            </x-jet-button>

        </aside>

        <div class="col-span-4">
            @if ($vista == 'grid')


                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($productos as $producto)
                        <li>
                            <figure>
                                <img src="{{ Storage::url($producto->imagenes->first()->url) }}" alt="">
                            </figure>
                            <a href="{{ route('productos.mostrar', $producto) }}">{{ $producto->nombre }} </a>
                            <p>{{ $producto->precio }} </p>
                            <p>{{ Str::limit($producto->descripcion, 20) }} </p>
                        </li>

                    @empty
                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Upss!</strong>
                                <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul style="display: flex; flex-direction: column;">
                    @forelse ($productos as $producto)
                        {{-- <li style="display: flex;">
                            <figure>
                                <img src="{{ Storage::url($producto->imagenes->first()->url) }}" alt="">
                            </figure>
                            <a href="{{ route('productos.mostrar', $producto) }}">{{ $producto->nombre }} </a>
                            <p>{{ $producto->precio }} </p>
                            <p>{{ Str::limit($producto->descripcion, 20) }} </p>
                        </li> --}}
                        <x-lista-productos :producto="$producto" />

                    @empty
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Upss!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    @endforelse
                </ul>
            @endif
            <div>{{ $productos->links() }} </div>
        </div>

    </div>
</div>
