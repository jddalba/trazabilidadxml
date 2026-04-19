@extends('layouts.app')

@section('content')

    <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
">

        <h2 style="margin:0;">XML Generados</h2>

        <a href="{{ route('ventas.index') }}"
           style="
            background:#64748b;
            color:white;
            padding:10px 16px;
            border-radius:8px;
            text-decoration:none;
            font-size:14px;
            font-weight:bold;
       ">
            ← Volver a Ventas
        </a>

    </div>

    <div style="
    background:white;
    border-radius:14px;
    box-shadow:0 8px 25px rgba(0,0,0,0.05);
    overflow:hidden;
">

        <table width="100%" style="margin:0;">

            <tr>
                <th>Archivo</th>
                <th width="180">Acción</th>
            </tr>

            @forelse($files as $file)

                <tr>

                    <td>{{ basename($file) }}</td>

                    <td>

                        <a href="{{ route('ventas.descargarArchivo', basename($file)) }}"
                           style="
                            background:#059669;
                            color:white;
                            padding:8px 12px;
                            border-radius:7px;
                            text-decoration:none;
                            font-size:13px;
                            font-weight:bold;
                       ">
                            Descargar
                        </a>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="2" style="text-align:center; padding:25px;">
                        No hay archivos XML generados.
                    </td>
                </tr>

            @endforelse

        </table>

    </div>

@endsection
