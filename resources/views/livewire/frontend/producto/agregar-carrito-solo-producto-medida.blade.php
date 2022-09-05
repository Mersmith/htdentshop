<div x-data>
    <p>PRODUCTO solO MEDIDA</p>


    <table class="text-gray-600">
        <thead class="border-b border-gray-300">
            <tr class="text-left">
                <th class="py-2">Nombre</th>
                <th class="py-2"></th>
                <th class="py-2"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-300">
            @foreach ($medidas as $itemMedida)
                <tr>
                    <td class="py-2">
                        <a class="uppercase">
                            {{ $itemMedida->nombre }}
                            {{ $itemMedida->colores->first()->pivot->cantidad }}
                        </a>
                    </td>

                    <td class="py-2">
                        <x-jet-secondary-button>-
                        </x-jet-secondary-button>
                        <span>{{ $cantidadCarrito }} </span>
                        <x-jet-secondary-button>+
                        </x-jet-secondary-button>
                    </td>
                    <td class="py-2">
                        <x-boton-agregar wire:click="agregarProducto" wire:loading.attr="disabled"
                            wire:target="agregarProducto" color="orange">
                            Agregar al carrito
                        </x-boton-agregar>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div>
        <p>Talla: </p>
        <select wire:model="medida_id">
            <option value="" selected disabled>Seleccione medida</option>
            @foreach ($medidas as $itemMedida)
                <option value="{{ $itemMedida->id }}">{{ $itemMedida->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div>
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
    </div> --}}
</div>
