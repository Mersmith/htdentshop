<div x-data>
    <p>PRODUCTO MEDIDA</p>
    <div>
        <p>Talla: </p>
        <select wire:model="medida_id">
            <option value="" selected disabled>Seleccione talla</option>
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
        <p>Stock disponible: {{ $stockProducto }} </p>
        <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1" wire:loading.attr="disabled"
            wire:target="disminuir" wire:click="disminuir">-
        </x-jet-secondary-button>
        <span>{{ $cantidadCarrito }} </span>
        <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= $wire.stockProducto"
            wire:loading.attr="disabled" wire:target="aumentar" wire:click="aumentar">+
        </x-jet-secondary-button>
    </div>
    <div>
        <x-boton-agregar x-bind:disabled="!$wire.stockProducto" color="orange">
            Agregar al carrito
        </x-boton-agregar>
    </div>
</div>
