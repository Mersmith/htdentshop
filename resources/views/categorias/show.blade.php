<x-app-layout>
    <div>
        <figure>
            <img src="{{Storage::url($categoria->imagen)}} " alt="">
        </figure>
        @livewire('categoria-filtro', ['categoria' => $categoria])
    </div>
</x-app-layout>
