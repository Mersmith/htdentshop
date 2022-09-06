<div class="mt-4">
    <div class="bg-gray-100 shadow-lg rounded-lg p-6">


   
        {{-- Cantidad --}}
        <div>

            <x-jet-label>
                Cantidad
            </x-jet-label>

            <x-jet-input type="number" wire:model.defer="cantidad" placeholder="Ingrese una cantidad" class="w-full" />

            <x-jet-input-error for="cantidad" />

        </div>

        <div class="flex justify-end items-center mt-4">

            <x-jet-action-message class="mr-3" on="saved">
                Agregado
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar
            </x-jet-button>
        </div>

    </div>

    @if ($medida_colores->count())

        <div class="mt-8">
            <table>
                <thead>
                    <tr>
                        <th class="px-4 py-2 w-1/3">
                            Medida
                        </th>

                        <th class="px-4 py-2 w-1/3">
                            Cantidad
                        </th>
                        <th class="px-4 py-2 w-1/3"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($medida_colores as $medida_color)
                        <tr wire:key="medida_color-{{ $medida_color->pivot->id }}">
                            <td class="capitalize px-4 py-2">
                                {{ $medida->nombre}}
                            </td>
                            <td class="px-4 py-2">
                                {{ $medida_color->pivot->cantidad }} unidades
                            </td>
                            <td class="px-4 py-2 flex">
                                <x-jet-secondary-button class="ml-auto mr-2"
                                    wire:click="edit({{ $medida_color->pivot->id }})" wire:loading.attr="disabled"
                                    wire:target="edit({{ $medida_color->pivot->id }})">
                                    Actualizar
                                </x-jet-secondary-button>

                                <x-jet-danger-button
                                    wire:click="$emit('deleteColorSize', {{ $medida_color->pivot->id }})">
                                    Eliminar
                                </x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif

    <x-jet-dialog-modal wire:model="abierto" wire:key="modal-size-product-{{ $medida->id }}">

        <x-slot name="title">
            Editar colores
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>
                    Color
                </x-jet-label>

                <select class="form-control w-full" wire:model="pivot_color_id">
                    <option value="">Seleccione un color</option>
                    @foreach ($colores as $color)
                        <option value="{{ $color->id }}">{{ ucfirst(__($color->nombre)) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-jet-label>
                    Cantidad
                </x-jet-label>
                <x-jet-input class="w-full" wire:model="pivot_cantidad" type="number"
                    placeholder="Ingrese una cantidad" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('abierto', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
