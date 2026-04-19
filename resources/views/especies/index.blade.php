@extends('layouts.app')

@section('content')

    <div style="max-width:100%;">

        <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    flex-wrap:wrap;
    margin-bottom:25px;
    ">

            <h1 style="margin:0;">Especies</h1>

            <a href="{{ route('especies.create') }}"
               class="btn">
                + Nueva especie
            </a>

        </div>

        <table>

            <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Especie</th>
                <th>AL3</th>
                <th>País</th>
                <th>Producción</th>
                <th>Conserv.</th>
                <th>Present.</th>
                <th>Fresc.</th>
                <th>Calibre</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

            @foreach($especies as $especie)

                <tr>

                    <td>{{ $especie->id }}</td>
                    <td>{{ $especie->codigo }}</td>
                    <td>{{ $especie->especie_comercial }}</td>
                    <td>{{ $especie->especie_al3 }}</td>
                    <td>{{ $especie->pais_al3 }}</td>
                    <td>{{ $especie->metodo?->descripcion }}</td>
                    <td>{{ $especie->cod_conservacion }}</td>
                    <td>{{ $especie->cod_presentacion }}</td>
                    <td>{{ $especie->cod_frescura ?: '-' }}</td>
                    <td>{{ $especie->cod_calibre ?: '-' }}</td>

                    <td>
                        <div style="
                    display:flex;
                    gap:8px;
                    flex-wrap:wrap;
                    ">

                            <a href="{{ route('especies.edit',$especie->id) }}"
                               class="btn">
                                Editar
                            </a>

                            <form action="{{ route('especies.destroy',$especie->id) }}"
                                  method="POST"
                                  style="margin:0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('¿Seguro que deseas borrar esta especie?')"
                                        style="background:#dc2626;">
                                    Borrar
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

@endsection
