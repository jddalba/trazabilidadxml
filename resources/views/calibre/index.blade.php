@extends('layouts.app')

@section('content')

    <h2>Calibre</h2>

    <a href="{{ route('calibres.create') }}">Nuevo Calibre</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Acciones</th>
        </tr>

        @foreach($calibre as $c)

            <tr>

                <td>{{ $c->id }}</td>
                <td>{{ $c->codigo }}</td>
                <td>

                    <a href="{{ route('calibres.edit',$c->id) }}">Editar</a>

                    <form action="{{ route('calibres.destroy',$c->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
