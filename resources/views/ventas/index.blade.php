@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div style="
        background:#d1fae5;
        color:#065f46;
        padding:14px;
        border-radius:10px;
        margin-bottom:20px;
        font-weight:bold;
    ">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="
        background:#fee2e2;
        color:#991b1b;
        padding:14px;
        border-radius:10px;
        margin-bottom:20px;
        font-weight:bold;
    ">
            {{ session('error') }}
        </div>
    @endif

    <div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
">

        <h2 style="margin:0;">Ventas</h2>

        <a href="{{ route('ventas.create') }}"
           style="
            background:#1565c0;
            color:white;
            padding:10px 16px;
            border-radius:8px;
            text-decoration:none;
            font-size:14px;
            font-weight:bold;
       ">
            + Nueva venta
        </a>

    </div>

    @forelse($ventas as $venta)

        <div style="
        background:white;
        border-radius:14px;
        box-shadow:0 8px 25px rgba(0,0,0,0.05);
        margin-bottom:25px;
        overflow:hidden;
    ">

            {{-- CABECERA --}}
            <div style="
            padding:18px 22px;
            border-bottom:1px solid #e5e7eb;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            flex-wrap:wrap;
        ">

                <div>
                    <div style="font-size:22px; font-weight:bold; color:#0f172a;">
                        Venta #{{ $venta->id }}
                    </div>

                    <div style="margin-top:6px; color:#475569; font-size:14px;">
                        Envío: <strong>{{ $venta->num_envio }}</strong> |
                        Establecimiento: <strong>{{ $venta->num_identificacion_establec }}</strong> |
                        Fecha: <strong>{{ $venta->fecha }}</strong>
                    </div>
                </div>

                <div style="display:flex; gap:8px; flex-wrap:wrap;">

                    <a href="{{ route('ventas.edit', $venta->id) }}"
                       style="
                        background:#2563eb;
                        color:white;
                        padding:8px 12px;
                        border-radius:7px;
                        text-decoration:none;
                        font-size:13px;
                   ">
                        Editar
                    </a>

                    <form action="{{ route('ventas.destroy', $venta->id) }}"
                          method="POST"
                          style="margin:0;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('¿Seguro que deseas borrar esta venta?')"
                                style="
                                background:#dc2626;
                                color:white;
                                border:none;
                                padding:8px 12px;
                                border-radius:7px;
                                cursor:pointer;
                                font-size:13px;
                            ">
                            Borrar
                        </button>

                    </form>

                    <a href="{{ route('ventas.xml', $venta->id) }}"
                       style="
                        background:#7c3aed;
                        color:white;
                        padding:8px 12px;
                        border-radius:7px;
                        text-decoration:none;
                        font-size:13px;
                   ">
                        XML
                    </a>

                    <a href="{{ route('ventas.descargarXML', $venta->id) }}"
                       style="
                        background:#059669;
                        color:white;
                        padding:8px 12px;
                        border-radius:7px;
                        text-decoration:none;
                        font-size:13px;
                   ">
                        Descargar
                    </a>

                </div>

            </div>

            {{-- LÍNEAS --}}
            <div style="padding:20px;">

                <table width="100%" style="margin:0; min-width:1000px;">

                    <tr>
                        <th>Fecha</th>
                        <th>Especie</th>
                        <th>Frescura</th>
                        <th>Calibre</th>
                        <th>Lote</th>
                        <th>Cantidad</th>
                        <th>Vendedor</th>
                        <th>Comprador</th>
                    </tr>

                    @forelse($venta->lineas as $linea)

                        <tr>
                            <td>{{ $linea->fecha_venta ?? $venta->fecha }}</td>
                            <td>{{ $linea->especie->especie_comercial ?? '' }}</td>
                            <td>{{ $linea->frescura ?: '-' }}</td>
                            <td>{{ $linea->calibre ?: '-' }}</td>
                            <td>{{ $linea->lote }}</td>
                            <td>{{ $linea->cantidad }}</td>
                            <td>{{ $linea->vendedor->nombre ?? '' }}</td>
                            <td>{{ $linea->comprador->nombre ?? '' }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" style="text-align:center; padding:20px;">
                                Sin líneas de venta.
                            </td>
                        </tr>

                    @endforelse

                </table>

            </div>

        </div>

    @empty

        <div style="
        background:white;
        padding:30px;
        border-radius:14px;
        text-align:center;
        box-shadow:0 8px 25px rgba(0,0,0,0.05);
    ">
            No hay ventas registradas.
        </div>

    @endforelse

@endsection
