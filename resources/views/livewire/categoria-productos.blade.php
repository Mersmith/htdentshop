<div class="glider-contain">
    <div class="glider">
        @foreach ($categoria->productos as $producto)
            <li>
                <figure>
                    <img src="{{ Storage::url($producto->imagenes->first()->ruta) }}" alt="">
                </figure>
            </li>
        @endforeach
    </div>

    <button aria-label="Previous" class="glider-prev">«</button>
    <button aria-label="Next" class="glider-next">»</button>
    <div role="tablist" class="dots"></div>
</div>
