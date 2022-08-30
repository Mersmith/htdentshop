<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear un producto</h1>

    <div class="grid grid-cols-2 gap-6 mb-4">

        {{-- Categoría --}}
        <div>
            <x-jet-label value="Categorías" />
            <select class="w-full form-control" wire:model="categoria_id">
                <option value="" selected disabled>Seleccione una categoría</option>

                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="categoria_id" />
        </div>

        {{-- Subcategoría --}}
        <div>
            <x-jet-label value="Subcategorías" />
            <select class="w-full form-control" wire:model="subcategoria_id">
                <option value="" selected disabled>Seleccione una subcategoría</option>

                @foreach ($subcategorias as $subcategoria)
                    <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="subcategoria_id" />
        </div>
    </div>

    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" 
                    class="w-full"
                    wire:model="nombre"
                    placeholder="Ingrese el nombre del producto" />
        <x-jet-input-error for="nombre" />
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text"
            disabled
            wire:model="ruta"
            class="w-full bg-gray-200" 
            placeholder="Ingrese el slug del producto" />

    <x-jet-input-error for="ruta" />
    </div>

    {{-- Descrición --}}
    <div class="mb-4">
        <div wire:ignore>
            <x-jet-label value="Descripción" />
            <textarea class="w-full form-control" rows="4"
                wire:model="descripcion"
                x-data 
                x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('descripcion', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );"
                x-ref="miEditor">
            </textarea>
        </div>
        <x-jet-input-error for="descripcion" />
    </div>

    <div class="grid grid-cols-2 gap-6 mb-4">
        {{-- Marca --}}
        <div>
            <x-jet-label value="Marca" />
            <select class="form-control w-full" wire:model="marca_id">
                <option value="" selected disabled>Seleccione una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                @endforeach
            </select>

            <x-jet-input-error for="marca_id" />
        </div>

        {{-- Precio --}}
        <div>
            <x-jet-label value="Precio" />
            <x-jet-input 
                wire:model="precio"
                type="number" 
                class="w-full" 
                step=".01" />
            <x-jet-input-error for="precio" />
        </div>
    </div>

    @if ($subcategoria_id)
        
        @if (!$this->subcategoria->color && !$this->subcategoria->medida)
            
            <div>
                <x-jet-label value="Cantidad" />
                <x-jet-input 
                    wire:model="cantidad"
                    type="number" 
                    class="w-full" />
                <x-jet-input-error for="cantidad" />
            </div>

        @endif

    @endif


    <div class="flex mt-4">
        <x-jet-button
            wire:loading.attr="disabled"
            wire:target="save"
            wire:click="save"
            class="ml-auto">
            Crear producto
        </x-jet-button>
    </div>

</div>
