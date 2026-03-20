@extends('layouts.app')

@section('content')

    <h2>Especies Maestra</h2>

    <a href="{{ route('especies-maestra.create') }}">Nueva especie</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Comercial</th>
            <th>Científico</th>
            <th>AL3</th>
            <th>Acciones</th>
        </tr>

        @foreach($especies as $e)

            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->nombre_comercial }}</td>
                <td>{{ $e->nombre_cientifico }}</td>
                <td>{{ $e->codigo_al3 }}</td>
                <td>
                    <a href="{{ route('especies-maestra.edit',$e->id) }}">
                        Editar
                    </a>
                    <form action="{{ route('especies-maestra.destroy',$e->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
