<x-app-layout>
    <div class="grid grid-cols-5">
        <div>
            @foreach ($producto->imagenes as $imagen)
                <li>
                    <img src="{{ Storage::url($imagen->url) }}" alt="">
                </li>
            @endforeach
        </div>

        <div class="col-span-4">
            <h1>{{ $producto->nombre }} </h1>
            <p>{{ $producto->resenas->avg('puntaje') }}</p>
            <i class="fas fa-star text-yellow-500"></i>
            <p>{{ $producto->resenas->count() }} reseñas</p>
            <p>Marca: {{ $producto->marca->nombre }}</p>
            <p>Precio: {{ $producto->precio }}</p>
            <p>Recibelo el: {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>

            <h2>Ganas {{ $producto->puntos_ganar }} puntos </h2>

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
                    <h2>Producto no Varia</h2>
                    @livewire('frontend.producto.agregar-carrito-producto', ['producto' => $producto])
                @endif
            </div>
        </div>

    </div>

    @include('frontend.productos.formularioResena')
    @if ($producto->resenas->isNotEmpty())
        {{-- @include('frontend.productos.resenas', ['resenas' => $producto->resenas, 'producto_id' => $producto->id]) --}}


        <div class="mt-6">
            <h2 class="font-bold text-lg">Reseñas</h2>
            <div class="mt-2" x-data="{ seleccionado: null }">
                @foreach ($producto->resenas as $key => $resena)
                    <div class="flex" style="flex-direction: column;">
                        <div class="flex-shrink-0">
                            <img src="{{ $resena->user->profile_photo_url }}" alt="{{ $resena->user->name }}">
                        </div>
                        <div>
                            <p>{{ $resena->user->name }}</p>
                            <span
                                @click="seleccionado !== {{ $key }} ? seleccionado = {{ $key }} : seleccionado = null"
                                style="cursor: pointer; color: red;">Responder</span>
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
                        <div x-show="seleccionado == {{ $key }}">
                            <h2>Responder</h2>
                            @include('frontend.productos.formularioResenaResponder', [
                                'padre_id' => $resena->id,
                                'producto_id' => $producto->id,
                            ])
                        </div>
                        <br>
                        @if (count($resena->respuestas) > 0)
                            <div style="margin-left: 50px;">
                                <h4>Respuestas</h4>
                                <div x-data="{ seleccionadoRespuesta: null }">
                                    @foreach ($resena->respuestas as $key2 => $respuesta)
                                        <strong>{{ $respuesta->user->name }}</strong>
                                        <span
                                            @click="seleccionadoRespuesta !== {{ $key2 }} ? seleccionadoRespuesta = {{ $key2 }} : seleccionadoRespuesta = null"
                                            style="cursor: pointer; color: red;">Responder</span>
                                        <p>{{ $respuesta->comentario }}</p>
                                        <div x-show="seleccionadoRespuesta == {{ $key2 }}">
                                            <h2>Responder</h2>
                                            @include('frontend.productos.formularioResenaResponder', [
                                                'padre_id' => $respuesta->id,
                                                'producto_id' => $producto->id,
                                            ])
                                        </div>
                                        @if (count($respuesta->respuestas) > 0)
                                            <hr>
                                            <div style="margin-left: 50px;">
                                                <h4>Respuestas 2</h4>
                                                @foreach ($respuesta->respuestas as $respuesta2)
                                                    <strong>{{ $respuesta2->user->name }}</strong>
                                                    <p>{{ $respuesta2->comentario }}</p>
                                                @endforeach
                                            </div>
                                        @endif
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                    <hr>
                @endforeach
            </div>
        </div>

    @endif

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
