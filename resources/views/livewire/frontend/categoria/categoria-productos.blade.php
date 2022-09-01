<div wire:init='cargaProductos'>

    @if (count($productos))
        <div class="glider-contain">
            <div class="glider-{{ $categoria->id }}">
                {{-- @foreach ($categoria->productos as $producto) --}}
                @foreach ($productos as $producto)
                    <li {{ $loop->last ? '' : 'sm:mr-4' }}>
                        <figure>
                            <img src="{{ Storage::url($producto->imagenes->first()->url) }}" alt="">
                        </figure>
                        <h2>
                            <a href="{{ route('productos.mostrar', $producto) }}">
                                {{ $producto->nombre }}
                            </a>
                        </h2>
                        <p>{{ $producto->precio }} </p>
                        <p>{{ Str::limit($producto->descripcion, 20) }} </p>
                    </li>
                @endforeach
            </div>
            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
        </div>
    @endif
</div>
