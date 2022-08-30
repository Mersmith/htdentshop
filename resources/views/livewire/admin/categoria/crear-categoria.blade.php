<div>
    <x-jet-form-section submit="crearCategoria" class="mb-6">
        <x-slot name="title">
            Crear nueva categoría
        </x-slot>

        <x-slot name="description">
            Complete la información necesaria para poder crear una nueva categoría
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
                <x-jet-label>
                    Ícono
                </x-jet-label>

                <x-jet-input wire:model.defer="crearFormulario.icono" type="text" class="w-full mt-1" />
                <x-jet-input-error for="crearFormulario.icono" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Marcas
                </x-jet-label>

                <div class="grid grid-cols-4">
                    @foreach ($marcas as $marca)
                        
                        <x-jet-label>
                            <x-jet-checkbox
                            {{--En los casos en los que no necesite actualizaciones de datos en vivo, Livewire tiene un .defermodificador que agrupa las actualizaciones de datos con la siguiente solicitud de red.--}}
                            wire:model.defer="crearFormulario.marcas"
                            name="marcas[]"
                            value="{{$marca->id}}" />
                            {{$marca->nombre}}
                        </x-jet-label>

                    @endforeach
                </div>
                <x-jet-input-error for="crearFormulario.marcas" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="crearFormulario.imagen" accept="image/*" type="file" class="mt-1" name="" id="{{$aleatorio}}">
                <x-jet-input-error for="crearFormulario.imagen" />
            </div>
        </x-slot>


        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="crearCategoriaMensaje">
                Categoría creada
            </x-jet-action-message>

            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Lista de categorías
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las categorías agregadas
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
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="py-2">
                                <span class="inline-block w-8 text-center mr-2">
                                    {!!$categoria->icono!!}
                                </span>

                                <a href="{{route('admin.categorias.mostrar', $categoria)}}" class="uppercase underline hover:text-blue-600">
                                    {{$categoria->nombre}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="editarCategoria('{{$categoria->ruta}}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="$emit('eliminarCategoriaModal', '{{$categoria->ruta}}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editarFormulario.abierto">

        <x-slot name="title">
            Editar categoría
        </x-slot>

        <x-slot name="content">

            <div class="space-y-3">

                <div>
                    @if ($editarImagen)
                        <img class="w-full h-64 object-cover object-center" src="{{$editarImagen->temporaryUrl()}}" alt="">
                    @else
                        <img class="w-full h-64 object-cover object-center" src="{{Storage::url($editarFormulario['imagen'])}}" alt="">
                    @endif
                </div>

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
                    <x-jet-label>
                        Ícono
                    </x-jet-label>

                    <x-jet-input wire:model.defer="editarFormulario.icono" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="editarFormulario.icono" />
                </div>

                <div>
                    <x-jet-label>
                        Marcas
                    </x-jet-label>

                    <div class="grid grid-cols-4">
                        @foreach ($marcas as $marca)
                            
                            <x-jet-label>
                                <x-jet-checkbox
                                wire:model.defer="editarFormulario.marcas"
                                name="marcas[]"
                                value="{{$marca->id}}" />
                                {{$marca->nombre}}
                            </x-jet-label>

                        @endforeach
                    </div>
                    <x-jet-input-error for="editarFormulario.marcas" />
                </div>

                <div>
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="editarImagen" accept="image/*" type="file" class="mt-1" name="" id="{{$aleatorio}}">
                    <x-jet-input-error for="editarImagen" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="actualizarCategoria" wire:loading.attr="disabled" wire:target="editarImagen, actualizarCategoria">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
