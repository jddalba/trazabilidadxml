@extends('layouts.app')

@section('content')

    <h2>Vendedores</h2>

    <a href="{{ route('vendedores.create') }}">Nuevo vendedor</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>NIF</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>

        @foreach($vendedores as $v)

            <tr>

                <td>{{ $v->id }}</td>
                <td>{{ $v->nombre }}</td>
                <td>{{ $v->nif }}</td>
                <td>{{ $v->direccion }}</td>

                <td>

                    <a href="{{ route('vendedores.edit',$v->id) }}">Editar</a>

                    <form action="{{ route('vendedores.destroy',$v->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
