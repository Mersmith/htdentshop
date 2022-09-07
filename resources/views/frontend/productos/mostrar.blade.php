<x-app-layout>
    <div class="grid grid-cols-5">
        <div>
            @foreach ($producto->imagenes as $imagen)
                <li>
                    <img src="{{ Storage::url($imagen->url) }}" alt="">
                </li>
            @endforeach
        </div>
        {{-- Policy Producto --}}
        @can('productoComprado', $producto)
            <div>
                <h2>Dejar Reseña</h2>
                <form action="{{ route('resenas.store', $producto) }}" method="POST">
                    @csrf
                    <textarea name="comentario" id="editor" cols="30" rows="10"></textarea>
                    <x-jet-input-error for="comentario" />

                    <div class="flex items-center mt-2" x-data="{ rating: 5 }">
                        <p class="font-semibold mr-3">Puntaje:</p>
                        <ul class="flex space-x-2">
                            <li x-bind:class="rating >= 1 ? 'text-yellow-500' : ''">
                                <button type="button" class="focus:outline-none" x-on:click="rating = 1">
                                    <i class="fas fa-star"></i>
                                </button>
                            </li>
                            <li x-bind:class="rating >= 2 ? 'text-yellow-500' : ''">
                                <button type="button" class="focus:outline-none" x-on:click="rating = 2">
                                    <i class="fas fa-star"></i>
                                </button>
                            </li>
                            <li x-bind:class="rating >= 3 ? 'text-yellow-500' : ''">
                                <button type="button" class="focus:outline-none" x-on:click="rating = 3">
                                    <i class="fas fa-star"></i>
                                </button>
                            </li>
                            <li x-bind:class="rating >= 4 ? 'text-yellow-500' : ''">
                                <button type="button" class="focus:outline-none" x-on:click="rating = 4">
                                    <i class="fas fa-star"></i>
                                </button>
                            </li>
                            <li x-bind:class="rating >= 5 ? 'text-yellow-500' : ''">
                                <button type="button" class="focus:outline-none" x-on:click="rating = 5">
                                    <i class="fas fa-star"></i>
                                </button>
                            </li>
                        </ul>
                        <input name="puntaje" class="hidden" type="number" x-model="rating">
                        <x-jet-button class="ml-auto">
                            Agregar reseña
                        </x-jet-button>
                    </div>
                </form>
            </div>
        @endcan

        @if ($producto->resenas->isNotEmpty())
            <div class="mt-6">
                <h2 class="font-bold text-lg">Reseñas</h2>
                <div class="mt-2">
                    @foreach ($producto->resenas as $resena)
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <img src="{{ $resena->user->profile_photo_url }}" alt="{{ $resena->user->name }}">
                            </div>
                            <div>
                                <p>{{ $resena->user->name }}</p>
                                <p>{{ $resena->created_at->diffForHumans() }}</p>
                            </div>
                            <div>
                                {!! $resena->comentario !!}
                            </div>
                            <div>
                                <br>
                                <p>{{ $resena->puntaje }}</p>
                                <i class="fas fa-star text-yellow-500"></i>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        @endif

        <div class="col-span-4">
            <h1>{{ $producto->nombre }} </h1>
            <p>{{ $producto->resenas->avg('puntaje') }}</p>
            <i class="fas fa-star text-yellow-500"></i>
            <p>{{ $producto->resenas->count() }} reseñas</p>
            <p>Marca: {{ $producto->marca->nombre }}</p>
            <p>Precio: {{ $producto->precio }}</p>
            <p>Recibelo el: {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>

            <div>
                @if ($producto->subcategoria->medida && !$producto->subcategoria->color)
                    <h2>Producto Varia en Medida</h2>
                    @livewire('frontend.producto.agregar-carrito-solo-producto-medida', ['producto' => $producto])
                @elseif($producto->subcategoria->color && !$producto->subcategoria->medida)
                    <h2>Producto Varia en Color</h2>
                    @livewire('frontend.producto.agregar-carrito-producto-color', ['producto' => $producto])
                @elseif($producto->subcategoria->color && $producto->subcategoria->medida)
                    <h2>Producto Varia en Medida y Color</h2>
                    @livewire('frontend.producto.agregar-carrito-producto-medida', ['producto' => $producto])
                @else
                    @livewire('frontend.producto.agregar-carrito-producto', ['producto' => $producto])
                @endif
            </div>
        </div>

    </div>


    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                })
                .catch(error => {
                    console.log(error);
                });
        </script>
    @endpush

</x-app-layout>
