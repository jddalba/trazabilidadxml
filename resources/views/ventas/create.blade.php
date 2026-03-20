@extends('layouts.app')

@section('content')

    <h2>Nueva Venta</h2>

    <form method="POST" action="{{ route('ventas.store') }}">

        @csrf

        <h3>Datos de la venta</h3>

        <input type="text" name="num_envio" placeholder="Num Envío"><br><br>
        <input type="text" name="num_identificacion_establec" placeholder="Establecimiento"><br><br>
        <input type="date" name="fecha"><br><br>

        <hr>

        <h3>Líneas</h3>

        <div id="lineas">

            <div class="linea">

                <select name="lineas[0][especie_id]">

                    @foreach($especies as $e)
                        <option value="{{ $e->id }}">{{ $e->especie_comercial }}</option>
                    @endforeach

                </select>

                <input type="text" name="lineas[0][lote]" placeholder="Lote">

                <input type="date" name="lineas[0][fecha_venta]">

                <input type="number" name="lineas[0][cantidad]" placeholder="Cantidad">

                <select name="lineas[0][vendedor_id]">

                    @foreach($vendedores as $v)
                        <option value="{{ $v->id }}">{{ $v->nombre }}</option>
                    @endforeach

                </select>

                <select name="lineas[0][comprador_id]">

                    @foreach($compradores as $c)
                        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                    @endforeach

                </select>

            </div>

        </div>

        <br>

        <button type="button" onclick="addLinea()">Añadir línea</button>

        <br><br>

        <button type="submit">Guardar venta</button>

    </form>

    <script>

        let index = 1;

        function addLinea(){

            let html = `
<div class="linea">

<select name="lineas[${index}][especie_id]">
@foreach($especies as $e)
            <option value="{{ $e->id }}">{{ $e->especie_comercial }}</option>
@endforeach
            </select>

            <input type="text" name="lineas[${index}][lote]" placeholder="Lote">

<input type="date" name="lineas[${index}][fecha_venta]">

<input type="number" name="lineas[${index}][cantidad]" placeholder="Cantidad">

<select name="lineas[${index}][vendedor_id]">
@foreach($vendedores as $v)
            <option value="{{ $v->id }}">{{ $v->nombre }}</option>
@endforeach
            </select>

            <select name="lineas[${index}][comprador_id]">
@foreach($compradores as $c)
            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
@endforeach
            </select>

            </div>
`;

            document.getElementById('lineas').insertAdjacentHTML('beforeend', html);

            index++;

        }

    </script>

@endsection
