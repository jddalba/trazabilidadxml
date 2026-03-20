@extends('layouts.app')

@section('content')
    <h2>Especies</h2>

    <a href="{{ route('especies.create') }}">Nueva especie</a>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Especie Comercial</th>
            <th>AL3</th>
            <th>País AL3</th>
            <th>M.Producción</th>
            <th>M.Conservación</th>
            <th>M.Presentación</th>
            <th>Frescura</th>
            <th>Calibre</th>
            <th>Acciones</th>
        </tr>

        @foreach($especies as $especie)

            <tr>

                <td>{{ $especie->id }}</td>
                <td>{{ $especie->codigo }}</td>
                <td>{{ $especie->especie_comercial }}</td>
                <td>{{ $especie->especie_al3 }}</td>
                <td>{{ $especie->pais_al3 }}</td>
                <td>{{ $especie->metodo_produccion }}</td>
                <td>{{ $especie->cod_conservacion }}</td>
                <td>{{ $especie->cod_presentacion }}</td>
                <td>{{ $especie->cod_frescura }}</td>
                <td>{{ $especie->cod_calibre }}</td>
                <td>

                    <a href="{{ route('especies.edit',$especie->id) }}">
                        Editar
                    </a>

                    <form action="{{ route('especies.destroy',$especie->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>
@endsection
