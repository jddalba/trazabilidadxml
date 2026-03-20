@extends('layouts.app')

@section('content')

    <h2>Presentaciones</h2>

    <a href="{{ route('presentaciones.create') }}">Nueva presentación</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>

        @foreach($presentaciones as $p)

            <tr>

                <td>{{ $p->id }}</td>
                <td>{{ $p->codigo }}</td>
                <td>{{ $p->descripcion }}</td>

                <td>

                    <a href="{{ route('presentaciones.edit',$p->id) }}">Editar</a>

                    <form action="{{ route('presentaciones.destroy',$p->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
