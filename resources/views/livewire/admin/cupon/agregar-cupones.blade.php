<div>
    <h2>Agregar Nuevo Cupon</h2>
    <div>
        <a href="{{ route('admin.cupones.mostrar') }}">Todos los cupones</a>
    </div>
    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
    <div>
        <form wire:submit.prevent="crearCupon">
            <div>
                <label>Codigo Cupon</label>
                <input type="text" placeholder="Código Cupon" wire:model="codigo">
                @error('codigo')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Tipo Cupon</label>
                <select wire:model="tipo">
                    <option value="">Seleccionar</option>
                    <option value="fijo">Fijo</option>
                    <option value="porcentaje">Porcentaje</option>
                </select>
                @error('tipo')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Descuento</label>
                <input type="text" placeholder="Descuento Cupon" wire:model="descuento">
                @error('descuento')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Carrito Monto</label>
                <input type="text" placeholder="Monto Carrito" wire:model="carrito_monto">
                @error('carrito_monto')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Fecha Expiración</label>
                <input type="date" placeholder="Monto Carrito" wire:model="fecha_expiracion">
                @error('fecha_expiracion')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>

    </div>

</div>
