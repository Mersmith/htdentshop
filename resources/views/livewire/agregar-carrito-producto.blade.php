<div x-data>
    <p>PRODUCTO SOLO</p>
    <div>
        <span>{{ $stock }} </span>
        <p>Stock disponible: {{ $cantidad }} </p>
        <x-jet-secondary-button disabled x-bind:disabled="$wire.stock <= 1" wire:loading.attr="disabled"
            wire:target="disminuir" wire:click="disminuir">-
        </x-jet-secondary-button>
        ||
        <x-jet-secondary-button x-bind:disabled="$wire.stock >= $wire.cantidad" wire:loading.attr="disabled" wire:target="aumentar"
            wire:click="aumentar">+
        </x-jet-secondary-button>
    </div>
    <div>
        <x-boton-agregar color="orange">
            Agregar al carrito
        </x-boton-agregar>
    </div>
</div>
