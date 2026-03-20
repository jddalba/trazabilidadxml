@extends('layouts.app')

@section('content')

    <h2>Frescura</h2>

    <a href="{{ route('frescura.create') }}">Nueva frescura</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Acciones</th>
        </tr>

        @foreach($frescura as $f)

            <tr>

                <td>{{ $f->id }}</td>
                <td>{{ $f->codigo }}</td>

                <td>

                    <a href="{{ route('frescura.edit',$f->id) }}">Editar</a>

                    <form action="{{ route('frescura.destroy',$f->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

@endsection
