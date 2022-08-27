<div>
    <div class="bg-white shadow-lg rounded-lg p-6 mt-12">
        <div>
            <x-jet-label>
                Talla
            </x-jet-label>

            <x-jet-input wire:model="nombre" type="text" placeholder="Ingrese una talla" class="w-full" />

            <x-jet-input-error for="nombre" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                Agregar
            </x-jet-button>
        </div>
    </div>


    <ul class="mt-12 space-y-4">
        @foreach ($medidas as $medida)
            <li class="bg-white shadow-lg rounded-lg p-6" wire:key="medida-{{ $medida->id }}">
                <div class="flex items-center">
                    <span class="text-xl font-medium">{{ $medida->nombre }}</span>

                    <div class="ml-auto">

                        <x-jet-button wire:click="edit({{ $medida->id }})" wire:loading.attr="disabled"
                            wire:target="edit({{ $medida->id }})">
                            <i class="fas fa-edit"></i>
                        </x-jet-button>

                        <x-jet-danger-button wire:click="$emit('deleteSize', {{ $medida->id }})">
                            <i class="fas fa-trash"></i>
                        </x-jet-danger-button>

                    </div>
                </div>

                @livewire('admin.color-medida', ['medida' => $medida], key('color-medida-' . $medida->id))
            </li>
        @endforeach
    </ul>


    <x-jet-dialog-modal wire:model="abierto">
        <x-slot name="title">
            Editar talla
        </x-slot>

        <x-slot name="content">
            <x-jet-label>
                Talla
            </x-jet-label>

            <x-jet-input wire:model="name_edit" type="text" class="w-full" />

            <x-jet-input-error for="name_edit" />
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
