@extends('layouts.app')

@section('content')

    <h2>Balsas</h2>

    <a href="{{ route('balsas.create') }}">Nueva balsa</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Instalación</th>
            <th>Acciones</th>
        </tr>

        @foreach($balsas as $b)

            <tr>

                <td>{{ $b->id }}</td>
                <td>{{ $b->nombre }}</td>
                <td>{{ $b->instalacion->nombre ?? '' }}</td>

                <td>

                    <a href="{{ route('balsas.edit',$b->id) }}">Editar</a>

                    <form action="{{ route('balsas.destroy',$b->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
