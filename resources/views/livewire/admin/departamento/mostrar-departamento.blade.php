<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            Departamento: {{$departamento->nombre}}
        </h2>
    </x-slot>

    <div class="container py-12">
        {{-- Agregar departamento --}}
        <x-jet-form-section submit="guardarCiudad" class="mb-6">
    
            <x-slot name="title">
                Agregar una nueva ciudad
            </x-slot>
    
            <x-slot name="description">
                Complete la información necesaria para poder agregar un nueva ciudad
            </x-slot>
    
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="crearFormulario.nombre" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="crearFormulario.nombre" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Costo
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="crearFormulario.costo" type="number" class="w-full mt-1" />
    
                    <x-jet-input-error for="crearFormulario.costo" />
                </div>
            </x-slot>
    
            <x-slot name="actions">
    
                <x-jet-action-message class="mr-3" on="guardadoCiudadMensaje">
                    Ciudad agregada
                </x-jet-action-message>
    
                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    
        {{-- Mostrar Departamentos --}}
        <x-jet-action-section>
            <x-slot name="title">
                Lista de ciudades
            </x-slot>
    
            <x-slot name="description">
                Aquí encontrará todas las ciudades agregadas
            </x-slot>
    
            <x-slot name="content">
    
                <table class="text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="py-2 w-full">Nombre</th>
                            <th class="py-2">Acción</th>
                        </tr>
                    </thead>
    
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($ciudades as $ciudad)
                            <tr>
                                <td class="py-2">
    
                                    <a href="{{route('admin.ciudades.mostrar', $ciudad)}}" class="uppercase underline hover:text-blue-600">
                                        {{$ciudad->nombre}}
                                    </a>
                                </td>
                                <td class="py-2">
                                    <div class="flex divide-x divide-gray-300 font-semibold">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="editarCiudadModal({{$ciudad}})">Editar</a>
                                        <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="$emit('eliminarCiudadModal', {{$ciudad->id}})">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </x-slot>
        </x-jet-action-section>
    
        {{-- Modal editar --}}
        <x-jet-dialog-modal wire:model="editarFormulario.abierto">
    
            <x-slot name="title">
                Editar departamento
            </x-slot>
    
            <x-slot name="content">
    
                <div class="space-y-3">
                   
                    <div>
                        <x-jet-label>
                            Nombre
                        </x-jet-label>
    
                        <x-jet-input wire:model="editarFormulario.nombre" type="text" class="w-full mt-1" />
    
                        <x-jet-input-error for="editarFormulario.nombre" />
                    </div>

                    <div>
                        <x-jet-label>
                            Costo
                        </x-jet-label>
    
                        <x-jet-input wire:model="editarFormulario.costo" type="text" class="w-full mt-1" />
    
                        <x-jet-input-error for="editarFormulario.costo" />
                    </div>
    
                 
                </div>
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-danger-button wire:click="actualizarCiudad" wire:loading.attr="disabled" wire:target="actualizarCiudad">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>
    
        </x-jet-dialog-modal>
    </div>

    @push('script')
        <script>
            Livewire.on('eliminarCiudadModal', ciudadId => {
            
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.departamento.mostrar-departamento', 'eliminarCiudad', ciudadId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });
        </script>
    @endpush
</div>
