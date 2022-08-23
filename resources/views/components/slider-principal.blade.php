@props(['sliders'])
<div class="container_slider">
    <div class="slider" id="slider">
        @foreach ($sliders as $sliderItem)
            {{-- @if ($sliderItem->imagen)               
            @endif --}}
            <div class="slider_section">
                <div class="slider_contenido">
                    <h2>{{ $sliderItem->titulo }} </h2>
                    <p>{{ $sliderItem->descripcion }}</p>
                    <a href="{{ $sliderItem->ruta }}">Ver más</a>
                </div>
                <img src="{{ asset("$sliderItem->imagen") }}" class="slider_imagen">
            </div>
        @endforeach
    </div>
    <div class="slider_boton slider_bonton_izquiero" id="boton_izquierdo">
        <i class="fa-solid fa-angle-left"></i>
    </div>
    <div class="slider_boton slider_bonton_derecho" id="boton_derecho">
        <i class="fa-solid fa-angle-right"></i>
    </div>
</div>
