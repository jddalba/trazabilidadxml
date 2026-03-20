@extends('layouts.app')

@section('content')

    <h2>Compradores</h2>

    <a href="{{ route('compradores.create') }}">Nuevo Comprador</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>NIF</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>

        @foreach($compradores as $c)

            <tr>

                <td>{{ $c->id }}</td>
                <td>{{ $c->nombre }}</td>
                <td>{{ $c->nif }}</td>
                <td>{{ $c->direccion }}</td>

                <td>

                    <a href="{{ route('compradores.edit',$c->id) }}">Editar</a>

                    <form action="{{ route('compradores.destroy',$c->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
