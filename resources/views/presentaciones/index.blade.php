@extends('layouts.app')

@section('content')

    <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
">

        <h2 style="margin:0;">Presentaciones</h2>

        <a href="{{ route('presentaciones.create') }}"
           style="
            background:#1565c0;
            color:white;
            padding:10px 16px;
            border-radius:8px;
            text-decoration:none;
            font-size:14px;
            font-weight:bold;
       ">
            + Nueva presentación
        </a>

    </div>

    <div style="
    background:white;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
">

        <table width="100%" style="margin:0;">

            <tr>
                <th width="80">ID</th>
                <th width="140">Código</th>
                <th>Descripción</th>
                <th width="180">Acciones</th>
            </tr>

            @foreach($presentaciones as $p)

                <tr>

                    <td>{{ $p->id }}</td>
                    <td>{{ $p->codigo }}</td>
                    <td>{{ $p->descripcion }}</td>

                    <td>

                        <div style="display:flex; gap:8px;">

                            <a href="{{ route('presentaciones.edit',$p->id) }}"
                               style="
                                background:#2563eb;
                                color:white;
                                padding:7px 10px;
                                border-radius:7px;
                                text-decoration:none;
                                font-size:13px;
                           ">
                                Editar
                            </a>

                            <form action="{{ route('presentaciones.destroy',$p->id) }}"
                                  method="POST"
                                  style="margin:0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('¿Seguro que deseas borrar esta presentación?')"
                                        style="
                                        background:#dc2626;
                                        color:white;
                                        border:none;
                                        padding:7px 10px;
                                        border-radius:7px;
                                        cursor:pointer;
                                        font-size:13px;
                                    ">
                                    Borrar
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @endforeach

        </table>

    </div>

@endsection
