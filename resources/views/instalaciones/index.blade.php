@extends('layouts.app')

@section('content')

    <h2>Instalaciones</h2>

    <a href="{{ route('instalaciones.create') }}">Nueva instalación</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código REGA</th>
            <th>Acciones</th>
        </tr>

        @foreach($instalaciones as $instalacion)

            <tr>

                <td>{{ $instalacion->id }}</td>
                <td>{{ $instalacion->nombre }}</td>
                <td>{{ $instalacion->codigo_rega }}</td>

                <td>

                    <a href="{{ route('instalaciones.edit',$instalacion->id) }}">
                        Editar
                    </a>

                    <form action="{{ route('instalaciones.destroy',$instalacion->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
