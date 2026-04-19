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

            <h1 style="margin:0;">Calibre</h1>

            <a href="{{ route('calibres.create') }}"
               class="btn">
                + Nuevo Calibre
            </a>

        </div>

        <table>

            <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>

            @foreach($calibre as $c)

                <tr>

                    <td>{{ $c->id }}</td>
                    <td>{{ $c->codigo }}</td>

                    <td>
                        <div style="
                        display:flex;
                        gap:8px;
                        flex-wrap:wrap;
                    ">

                            <a href="{{ route('calibres.edit',$c->id) }}"
                               class="btn">
                                Editar
                            </a>

                            <form action="{{ route('calibres.destroy',$c->id) }}"
                                  method="POST"
                                  style="margin:0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('¿Seguro que deseas borrar este calibre?')"
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
