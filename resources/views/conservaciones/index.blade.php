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

            <h1 style="margin:0;">Métodos Conservación</h1>

            <a href="{{ route('conservaciones.create') }}"
               class="btn">
                + Nuevo Método Conservación
            </a>

        </div>

        <table>

            <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

            @foreach($conservaciones as $c)

                <tr>

                    <td>{{ $c->id }}</td>
                    <td>{{ $c->codigo }}</td>
                    <td>{{ $c->descripcion }}</td>

                    <td>
                        <div style="
                        display:flex;
                        gap:8px;
                        flex-wrap:wrap;
                    ">

                            <a href="{{ route('conservaciones.edit',$c->id) }}"
                               class="btn">
                                Editar
                            </a>

                            <form action="{{ route('conservaciones.destroy',$c->id) }}"
                                  method="POST"
                                  style="margin:0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('¿Seguro que deseas borrar este registro?')"
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
