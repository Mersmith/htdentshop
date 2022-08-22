@props(['sliders'])
<div>
    @foreach ($sliders as $key => $sliderItem)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @if ($sliderItem->imagen)
                <img src=" {{ asset("$sliderItem->imagen") }}" class="d-block w-100" alt="...">
            @endif

            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>
                        {{ $sliderItem->titulo }}
                    </h1>
                    <p>
                        {{ $sliderItem->descripcion }}
                    </p>
                    <div>
                        <a href="{{ $sliderItem->ruta }}" class="btn btn-slider">
                            Ver más
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
