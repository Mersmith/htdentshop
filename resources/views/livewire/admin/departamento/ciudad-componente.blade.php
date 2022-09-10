<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
            Ciudad: {{$ciudad->nombre}}
        </h2>
    </x-slot>

    <div class="container py-12">
        {{-- Agregar distrito --}}
        <x-jet-form-section submit="crearDistrito" class="mb-6">
    
            <x-slot name="title">
                Agregar una nueva distrito
            </x-slot>
    
            <x-slot name="description">
                Complete la información necesaria para poder agregar un nuevo distrito
            </x-slot>
    
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Nombre
                    </x-jet-label>
    
                    <x-jet-input wire:model.defer="crearFormulario.nombre" type="text" class="w-full mt-1" />
    
                    <x-jet-input-error for="crearFormulario.nombre" />
                </div>

            </x-slot>
    
            <x-slot name="actions">
    
                <x-jet-action-message class="mr-3" on="guardadoMensaje">
                    Distrito agregado
                </x-jet-action-message>
    
                <x-jet-button>
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
    
        {{-- Mostrar Departamentos --}}
        <x-jet-action-section>
            <x-slot name="title">
                Lista de distritos
            </x-slot>
    
            <x-slot name="description">
                Aquí encontrará todas los distritos agregados
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
                        @foreach ($distritos as $distrito)
                            <tr>
                                <td class="py-2">
    
                                    {{$distrito->nombre}}
                                    {{-- <a href="{{route('admin.districts.show', $district)}}" class="uppercase underline hover:text-blue-600">
                                        {{$district->name}}
                                    </a> --}}
                                </td>
                                <td class="py-2">
                                    <div class="flex divide-x divide-gray-300 font-semibold">
                                        <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="editarModalDistrito({{$distrito}})">Editar</a>
                                        <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="$emit('eliminarDistritoModal', {{$distrito->id}})">Eliminar</a>
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
                Editar distrito
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
    
                 
                </div>
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-danger-button wire:click="actualizarDistrito" wire:loading.attr="disabled" wire:target="actualizarDistrito">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>
    
        </x-jet-dialog-modal>
    </div>

    @push('script')
        <script>
            Livewire.on('eliminarDistritoModal', distritoId => {
            
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

                        Livewire.emitTo('admin.departamento.ciudad-componente', 'eliminarDistrito', distritoId)

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
