<div class="container py-12">
    
    {{-- Formulario crear categoría --}}
    <x-jet-form-section submit="crearSubcategoria" class="mb-6">
        <x-slot name="title">
            Crear nueva subcategoría
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder crear una nueva subcategoría
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="crearFormulario.nombre" type="text" class="w-full mt-1" />

                <x-jet-input-error for="crearFormulario.nombre" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Slug
                </x-jet-label>

                <x-jet-input disabled wire:model="crearFormulario.ruta" type="text" class="w-full mt-1 bg-gray-100" />
                <x-jet-input-error for="crearFormulario.ruta" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <p>¿Está subcategoría necesita especifiquemos color?</p>

                    <div class="ml-auto">
                        <label>
                            <input type="radio" value="1" name="color" wire:model.defer="crearFormulario.color">
                            Si
                        </label>
                        
                        <label class="ml-2">
                            <input type="radio" value="0" name="color" wire:model.defer="crearFormulario.color">
                            No
                        </label>
                    </div>
                </div>

                <x-jet-input-error for="crearFormulario.color" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <p>¿Está subcategoría necesita especifiquemos talla?</p>

                    <div class="ml-auto">
                        <label>
                            <input type="radio" value="1" name="medida" wire:model.defer="crearFormulario.medida">
                            Si
                        </label>
                        
                        <label class="ml-2">
                            <input type="radio" value="0" name="medida" wire:model.defer="crearFormulario.medida">
                            No
                        </label>
                    </div>
                </div>

                <x-jet-input-error for="crearFormulario.medida" />
            </div>

            
        </x-slot>


        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="crearSubcategoriaMensaje">
                Categoría subcategoría
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    {{-- Lista de subcategorías --}}
    <x-jet-action-section>
        <x-slot name="title">
            Lista de subcategorías
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las subcategorías agregadas
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
                    @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td class="py-2">

                                <a href="{{route('admin.categorias.mostrar', $subcategoria)}}" class="uppercase">
                                    {{$subcategoria->nombre}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="editarSubcategoria('{{$subcategoria->id}}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="$emit('eliminarSubcategoriaModal', '{{$subcategoria->id}}')">Eliminar</a>
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
            Editar subcategoría
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
                        Slug
                    </x-jet-label>

                    <x-jet-input disabled wire:model="editarFormulario.ruta" type="text" class="w-full mt-1 bg-gray-100" />
                    <x-jet-input-error for="editarFormulario.ruta" />
                </div>

                <div>
                    <div class="flex">
                        <p>¿Está subcategoría necesita especifiquemos color?</p>
    
                        <div class="ml-auto">
                            <label>
                                <input type="radio" value="1" name="color" wire:model.defer="editarFormulario.color">
                                Si
                            </label>
                            
                            <label class="ml-2">
                                <input type="radio" value="0" name="color" wire:model.defer="editarFormulario.color">
                                No
                            </label>
                        </div>
                    </div>
    
                    <x-jet-input-error for="crearFormulario.color" />
                </div>
    
                <div>
                    <div class="flex">
                        <p>¿Está subcategoría necesita especifiquemos talla?</p>
    
                        <div class="ml-auto">
                            <label>
                                <input type="radio" value="1" name="medida" wire:model.defer="editarFormulario.medida">
                                Si
                            </label>
                            
                            <label class="ml-2">
                                <input type="radio" value="0" name="medida" wire:model.defer="editarFormulario.medida">
                                No
                            </label>
                        </div>
                    </div>
    
                    <x-jet-input-error for="crearFormulario.medida" />
                </div>

               
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="actualizarSubcategoria" wire:loading.attr="disabled" wire:target="actualizarSubcategoria">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script>
            Livewire.on('eliminarSubcategoriaModal', subcategoriaId => {
            
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

                        Livewire.emitTo('admin.categoria.mostrar-categoria', 'delete', subcategoriaId)

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
