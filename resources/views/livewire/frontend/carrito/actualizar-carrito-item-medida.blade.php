<div class="flex items-center" x-data>
    <p style="margin-right: 5px;">Stock: {{$cantidadProducto}}</p>
    
    <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1" wire:loading.attr="disabled"
        wire:target="disminuir" wire:click="disminuir">-
    </x-jet-secondary-button>
    <span>{{ $cantidadCarrito }} </span>
    <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= $wire.cantidadProducto" wire:loading.attr="disabled"
        wire:target="aumentar" wire:click="aumentar">+
    </x-jet-secondary-button>

</div>
