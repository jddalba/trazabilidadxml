@extends('layouts.app')

@section('content')

    <h2>Ventas</h2>

    <a href="{{ route('ventas.create') }}">Nueva venta</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Num Envío</th>
            <th>Establecimiento</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>

        @foreach($ventas as $v)

            <tr>

                <td>{{ $v->id }}</td>
                <td>{{ $v->num_envio }}</td>
                <td>{{ $v->num_identificacion_establec }}</td>
                <td>{{ $v->fecha }}</td>

                <td>

                    <a href="{{ route('ventas.edit',$v->id) }}">Editar</a>

                    <form action="{{ route('ventas.destroy',$v->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
