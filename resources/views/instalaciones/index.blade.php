@extends('layouts.app')

@section('content')

    <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
">

        <h2 style="margin:0;">Instalaciones</h2>

        <a href="{{ route('instalaciones.create') }}"
           style="
            background:#1565c0;
            color:white;
            padding:9px 14px;
            border-radius:8px;
            text-decoration:none;
            font-size:13px;
            font-weight:bold;
       ">
            + Nueva instalación
        </a>

    </div>

    <div style="
    background:white;
    border-radius:14px;
    overflow:auto;
    box-shadow:0 8px 25px rgba(0,0,0,.05);
">

        <table width="100%" style="min-width:900px;">

            <tr>
                <th width="70">ID</th>
                <th>Nombre</th>
                <th width="180">Código REGA</th>
                <th width="220">Establecimiento Venta</th>
                <th width="170">Acciones</th>
            </tr>

            @foreach($instalaciones as $instalacion)

                <tr>

                    <td>{{ $instalacion->id }}</td>
                    <td>{{ $instalacion->nombre }}</td>
                    <td>{{ $instalacion->codigo_rega }}</td>
                    <td>{{ $instalacion->establecimiento_venta }}</td>

                    <td>

                        <div style="display:flex; gap:6px; flex-wrap:wrap;">

                            <a href="{{ route('instalaciones.edit',$instalacion->id) }}"
                               style="
                            background:#2563eb;
                            color:white;
                            padding:6px 10px;
                            border-radius:7px;
                            text-decoration:none;
                            font-size:12px;
                       ">
                                Editar
                            </a>

                            <form action="{{ route('instalaciones.destroy',$instalacion->id) }}"
                                  method="POST"
                                  style="margin:0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('¿Seguro que deseas borrar esta instalación?')"
                                        style="
                                background:#dc2626;
                                color:white;
                                border:none;
                                padding:6px 10px;
                                border-radius:7px;
                                cursor:pointer;
                                font-size:12px;
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
