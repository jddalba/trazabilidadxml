@extends('layouts.app')

@section('content')

    <h2>Métodos de Producción</h2>

    <a href="{{ route('metodos-produccion.create') }}">Nuevo Método</a>

    <table border="1">
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        @foreach($metodos as $m)
            <tr>
                <td>{{ $m->id }}</td>
                <td>{{ $m->descripcion }}</td>
                <td>
                    <a href="{{ route('metodos-produccion.edit',$m->id) }}">Editar</a>
                    <form action="{{ route('metodos-produccion.destroy',$m->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
