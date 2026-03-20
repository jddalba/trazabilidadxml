@extends('layouts.app')

@section('content')

    <h2>Editar Venta</h2>

    <form method="POST" action="{{ route('ventas.update',$venta->id) }}">

        @csrf
        @method('PUT')

        <h3>Datos de la venta</h3>

        <input type="text" name="num_envio" value="{{ $venta->num_envio }}"><br><br>

        <input type="text" name="num_identificacion_establec" value="{{ $venta->num_identificacion_establec }}"><br><br>

        <input type="date" name="fecha" value="{{ $venta->fecha }}"><br><br>

        <hr>

        <h3>Líneas</h3>

        <div id="lineas">

            @foreach($venta->lineas as $i => $linea)

                <div class="linea">

                    <select name="lineas[{{ $i }}][especie_id]">

                        @foreach($especies as $e)
                            <option value="{{ $e->id }}" {{ $linea->especie_id == $e->id ? 'selected' : '' }}>
                                {{ $e->especie_comercial }}
                            </option>
                        @endforeach

                    </select>

                    <input type="text" name="lineas[{{ $i }}][lote]" value="{{ $linea->lote }}">

                    <input type="date" name="lineas[{{ $i }}][fecha_venta]" value="{{ $linea->fecha_venta }}">

                    <input type="number" name="lineas[{{ $i }}][cantidad]" value="{{ $linea->cantidad }}">

                    <select name="lineas[{{ $i }}][vendedor_id]">

                        @foreach($vendedores as $v)
                            <option value="{{ $v->id }}" {{ $linea->vendedor_id == $v->id ? 'selected' : '' }}>
                                {{ $v->nombre }}
                            </option>
                        @endforeach

                    </select>

                    <select name="lineas[{{ $i }}][comprador_id]">

                        @foreach($compradores as $c)
                            <option value="{{ $c->id }}" {{ $linea->comprador_id == $c->id ? 'selected' : '' }}>
                                {{ $c->nombre }}
                            </option>
                        @endforeach

                    </select>

                </div>

            @endforeach

        </div>

        <br>

        <button type="button" onclick="addLinea()">Añadir línea</button>

        <br><br>

        <button type="submit">Actualizar venta</button>

    </form>

    <script>

        let index = {{ count($venta->lineas) }};

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
