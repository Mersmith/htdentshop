<div>


    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Productos
                </h1>

                <x-jet-danger-button wire:click="$emit('deleteProduct')">
                    Eliminar
                </x-jet-danger-button>
            </div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear un producto</h1>

        <div class="mb-4" wire:ignore>
            <form action="{{ route('admin.productos.files', $producto) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>

        @if ($producto->imagenes->count())

            <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h1>

                <ul class="flex flex-wrap">
                    @foreach ($producto->imagenes as $imagen)
                        <li class="relative" wire:key="image-{{ $imagen->id }}">
                            <img class="w-32 h-20 object-cover" src="{{ Storage::url($imagen->url) }}" alt="">
                            <x-jet-danger-button class="absolute right-2 top-2"
                                wire:click="deleteImage({{ $imagen->id }})" wire:loading.attr="disabled"
                                wire:target="deleteImage({{ $imagen->id }})">
                                x
                            </x-jet-danger-button>
                        </li>
                    @endforeach

                </ul>
            </section>

        @endif


        @livewire('admin.producto.estado-producto', ['producto' => $producto], key('estado-producto-' . $producto->id))

        {{-- <div class="bg-white shadow-xl rounded-lg p-6">

        </div> --}}

        <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="grid grid-cols-2 gap-6 mb-4">

                {{-- Categoría --}}
                <div>
                    <x-jet-label value="Categorías" />
                    <select class="w-full form-control" wire:model="categoria_id">
                        <option value="" selected disabled>Seleccione una categoría</option>

                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="categoria_id" />
                </div>

                {{-- Subcategoría --}}
                <div>
                    <x-jet-label value="Subcategorías" />
                    <select class="w-full form-control" wire:model="producto.subcategoria_id">
                        <option value="" selected disabled>Seleccione una subcategoría</option>

                        @foreach ($subcategorias as $subcategoria)
                            <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="producto.subcategoria_id" />
                </div>
            </div>

            {{-- Nombre --}}
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="producto.nombre"
                    placeholder="Ingrese el nombre del producto" />
                <x-jet-input-error for="producto.nombre" />
            </div>

            {{-- Slug --}}
            <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" disabled wire:model="ruta" class="w-full bg-gray-200"
                    placeholder="Ingrese el slug del producto" />

                <x-jet-input-error for="ruta" />
            </div>

            {{-- Descrición --}}
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea class="w-full form-control" rows="4" wire:model="producto.descripcion" x-data x-init="ClassicEditor.create($refs.miEditor)
                        .then(function(editor) {
                            editor.model.document.on('change:data', () => {
                                @this.set('producto.descripcion', editor.getData())
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });"
                        x-ref="miEditor">
                    </textarea>
                </div>
                <x-jet-input-error for="producto.descripcion" />
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Marca --}}
                <div>
                    <x-jet-label value="Marca" />
                    <select class="form-control w-full" wire:model="producto.marca_id">
                        <option value="" selected disabled>Seleccione una marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>

                    <x-jet-input-error for="producto.marca_id" />
                </div>

                {{-- Precio --}}
                <div>
                    <x-jet-label value="Precio" />
                    <x-jet-input wire:model="producto.precio" type="number" class="w-full" step=".01" />
                    <x-jet-input-error for="producto.precio" />
                </div>
            </div>


            @if ($this->subcategoria)


                @if (!$this->subcategoria->color && !$this->subcategoria->medida)
                    <div>
                        <x-jet-label value="Cantidad" />
                        <x-jet-input wire:model="producto.cantidad" type="number" class="w-full" />
                        <x-jet-input-error for="producto.cantidad" />
                    </div>
                @endif

            @endif

            <div class="flex justify-end items-center mt-4">

                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar producto
                </x-jet-button>
            </div>
        </div>


        @if ($this->subcategoria)

            @if ($this->subcategoria->medida && !$this->subcategoria->color)
                <h2>Producto Varia en Medida</h2>
                @livewire('admin.producto.solo-medida-producto', ['producto' => $producto], key('medida-producto-' . $producto->id))
            @elseif ($this->subcategoria->color && $this->subcategoria->medida)
                <h2>Producto Varia en Medida y Color</h2>
                @livewire('admin.producto.medida-producto', ['producto' => $producto], key('medida-producto-' . $producto->id))
            @elseif($this->subcategoria->color && !$this->subcategoria->medida)
                <h2>Producto Varia en Color</h2>
                @livewire('admin.producto.color-producto', ['producto' => $producto], key('color-producto-' . $producto->id))
            @endif

        @endif


    </div>


    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };


            Livewire.on('deleteProduct', () => {

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

                        Livewire.emitTo('admin.producto.edit-producto', 'delete');

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })

            Livewire.on('deleteSize', sizeId => {

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

                        Livewire.emitTo('admin.producto.medida-producto', 'delete', sizeId);

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            })

            Livewire.on('deletePivot', pivot => {
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

                        Livewire.emitTo('admin.producto.color-producto', 'delete', pivot);

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })

            Livewire.on('deleteColorSize', pivot => {
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

                        Livewire.emitTo('admin.producto.color-medida', 'delete', pivot);

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
