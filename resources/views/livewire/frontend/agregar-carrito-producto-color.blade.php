<div x-data>
    <h2>
        PRODUCTO COLOR
    </h2>
    <select wire:model="color_id">
        <option value="" selected disabled>Primero selccione el color</option>
        @foreach ($colores as $colorItem)
            <option value="{{ $colorItem->id }}">{{ $colorItem->nombre }}</option>
        @endforeach
    </select>
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
        <x-boton-agregar x-bind:disabled="$wire.cantidadCarrito > $wire.stockProducto" x-bind:disabled="!$wire.stockProducto" wire:click="agregarProducto" wire:loading.attr="disabled"
            wire:target="agregarProducto" color="orange">
            Agregar al carrito
        </x-boton-agregar>
    </div>

</div>
