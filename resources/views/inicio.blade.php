<x-app-layout>
    <div>
        <h1></h1>
        <div>
            {{ $categorias->first()->nombre }}
        </div>
        @livewire('categoria-productos', ['categoria' => $categorias->first()])
    </div>
    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 3,
            dots: '#dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    </script>
</x-app-layout>
