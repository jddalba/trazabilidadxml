@extends('layouts.app')

@section('content')

    <h2>Países</h2>

    <a href="{{ route('paises.create') }}">Nuevo país</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>AL3</th>
            <th>Acciones</th>
        </tr>
        @foreach($paises as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nombre }}</td>
                <td>{{ $p->codigo_al3 }}</td>
                <td>
                    <a href="{{ route('paises.edit',$p->id) }}">Editar</a>
                    <form action="{{ route('paises.destroy',$p->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
