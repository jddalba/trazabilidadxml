@extends('layouts.app')

@section('content')

    <h2>Conservaciones</h2>

    <a href="{{ route('conservaciones.create') }}">Nueva conservación</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        @foreach($conservaciones as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->codigo }}</td>
                <td>{{ $c->descripcion }}</td>
                <td>
                    <a href="{{ route('conservaciones.edit',$c->id) }}">Editar</a>
                    <form action="{{ route('conservaciones.destroy',$c->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
