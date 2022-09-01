<div x-data>
    <p>PRODUCTO MEDIDA</p>
    <div>
        <p>Talla: </p>
        <select wire:model="medida_id">
            <option value="" selected disabled>Seleccione medida</option>
            @foreach ($medidas as $itemMedida)
                <option value="{{ $itemMedida->id }}">{{ $itemMedida->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <p>Color: </p>
        <select wire:model="color_id">
            <option value="" selected disabled>Seleccione color</option>
            @foreach ($colores as $itemColor)
                <option value="{{ $itemColor->id }}">{{ $itemColor->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div>
        {{-- <p>Stock disponible: {{ $stockProducto }} </p> --}}
        <p>Stock disponible:
            @if ($stockProducto)
                {{ $stockProducto }}
            @else
                {{ $producto->stock }}
            @endif
        </p>
        <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1" wire:loading.attr="disabled"
            wire:target="disminuir" wire:click="disminuir">-
        </x-jet-secondary-button>
        <span>{{ $cantidadCarrito }} </span>
        <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= $wire.stockProducto"
            wire:loading.attr="disabled" wire:target="aumentar" wire:click="aumentar">+
        </x-jet-secondary-button>
    </div>
    <div>
        <x-boton-agregar x-bind:disabled="$wire.cantidadCarrito > $wire.stockProducto"
            x-bind:disabled="!$wire.stockProducto" wire:click="agregarProducto" wire:loading.attr="disabled"
            wire:target="agregarProducto" color="orange">
            Agregar al carrito
        </x-boton-agregar>
    </div>
</div>
