<div class="mt-6" style="margin-left: 50px;">
    <h2 class="font-bold text-lg">Reseñas</h2>
    <div class="mt-2" x-data="{ seleccionado: null }">
        @foreach ($resenas as $key => $resena)
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
                    ])
                </div>
                <br>
                @if (count($resena->respuestas) > 0)
                    @include('frontend.productos.resenas', [
                        'resenas' => $resena->respuestas,
                        'producto_id' => $producto->id,
                    ])
                @endif

            </div>
            <hr>
        @endforeach
    </div>
</div>
