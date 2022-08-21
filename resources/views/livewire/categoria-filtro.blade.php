<div>
    <div>
        <h1>{{ $categoria->nombre }}</h1>
        <div style="display: flex">
            <p style="color: {{ $vista == 'grid' ? 'blue' : '' }} " wire:click="$set('vista', 'grid')">Cuadros</p> |
            <p style="color: {{ $vista == 'lista' ? 'blue' : '' }} " wire:click="$set('vista', 'lista')">Lista</p>
        </div>
        <br>
    </div>
    <div class="grid grid-cols-5">
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
                <ul class="grid grid-cols-4 gap-4">
                    @foreach ($productos as $producto)
                        <li>
                            <figure>
                                <img src="{{ Storage::url($producto->imagenes->first()->url) }}" alt="">
                            </figure>
                            <a href="{{route('productos.show', $producto)}}">{{ $producto->nombre }} </a>
                            <p>{{ $producto->precio }} </p>
                            <p>{{ Str::limit($producto->descripcion, 20) }} </p>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul style="display: flex; flex-direction: column;">
                    @foreach ($productos as $producto)
                        <li style="display: flex;">
                            <figure>
                                <img src="{{ Storage::url($producto->imagenes->first()->url) }}" alt="">
                            </figure>
                            <a href="{{route('productos.show', $producto)}}">{{ $producto->nombre }} </a>
                            <p>{{ $producto->precio }} </p>
                            <p>{{ Str::limit($producto->descripcion, 20) }} </p>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div>{{ $productos->links() }} </div>
        </div>

    </div>
</div>
