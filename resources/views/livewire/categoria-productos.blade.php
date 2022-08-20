<div wire:init='loadProductos'>

    @if (count($productos))
        <div class="glider-contain">
            <div class="glider">
                {{-- @foreach ($categoria->productos as $producto) --}}
                @foreach ($productos as $producto)
                    <li {{ $loop->last ? '' : 'mr-4' }}>
                        <figure>
                            <img src="{{ Storage::url($producto->imagenes->first()->url) }}" alt="">
                        </figure>
                        <h2>{{ $producto->nombre }} </h2>
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
        <p>CARGANDO</p>
    @endif
</div>
