@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div style="background:#d1fae5;color:#065f46;padding:12px;border-radius:10px;margin-bottom:18px;font-weight:bold;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background:#fee2e2;color:#991b1b;padding:12px;border-radius:10px;margin-bottom:18px;font-weight:bold;">
            {{ session('error') }}
        </div>
    @endif

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;flex-wrap:wrap;gap:10px;">

        <h2 style="margin:0;">Ventas</h2>

        <a href="{{ route('ventas.create') }}"
           style="background:#1565c0;color:white;padding:10px 16px;border-radius:8px;text-decoration:none;font-size:14px;font-weight:bold;">
            + Nueva venta
        </a>

    </div>

    @forelse($ventas as $venta)

        <div style="background:white;border-radius:14px;box-shadow:0 8px 25px rgba(0,0,0,.05);margin-bottom:22px;overflow:hidden;">

            {{-- CABECERA --}}
            <div style="padding:16px 18px;border-bottom:1px solid #e5e7eb;display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;">

                <div>
                    <div style="font-size:20px;font-weight:bold;color:#0f172a;">
                        Venta #{{ $venta->id }}
                    </div>

                    <div style="margin-top:5px;color:#475569;font-size:13px;">
                        Fecha: <strong>{{ $venta->fecha }}</strong>
                    </div>
                </div>

                <div style="display:flex;gap:6px;flex-wrap:wrap;">

                    <a href="{{ route('ventas.edit', $venta->id) }}"
                       style="background:#2563eb;color:white;padding:7px 10px;border-radius:7px;text-decoration:none;font-size:12px;">
                        Editar
                    </a>

                    <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="margin:0;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('¿Seguro que deseas borrar esta venta?')"
                                style="background:#dc2626;color:white;border:none;padding:7px 10px;border-radius:7px;cursor:pointer;font-size:12px;">
                            Borrar
                        </button>
                    </form>

                    <a href="{{ route('ventas.descargarXML', $venta->id) }}"
                       style="background:#059669;color:white;padding:7px 10px;border-radius:7px;text-decoration:none;font-size:12px;">
                        Descargar
                    </a>

                </div>

            </div>

            {{-- TABLA --}}
            <div style="padding:14px;overflow-x:auto;">

                <table width="100%" style="border-collapse:collapse;font-size:13px;min-width:850px;">

                    <tr style="background:#f8fafc;">
                        <th style="padding:8px;">Fecha</th>
                        <th style="padding:8px;">Instalación</th>
                        <th style="padding:8px;">Especie</th>
                        <th style="padding:8px;">Fr.</th>
                        <th style="padding:8px;">Cal.</th>
                        <th style="padding:8px;">Lote</th>
                        <th style="padding:8px;">Kg</th>
                        <th style="padding:8px;">Vendedor</th>
                        <th style="padding:8px;">Comprador</th>
                    </tr>

                    @forelse($venta->lineas as $linea)

                        <tr style="border-top:1px solid #f1f5f9;">

                            <td style="padding:8px;">{{ $venta->fecha }}</td>

                            <td style="padding:8px;">
                                {{ $linea->instalacion->nombre
                                    ?? $linea->instalacion->establecimiento_venta
                                    ?? '-' }}
                            </td>

                            <td style="padding:8px;">
                                {{ $linea->especie->especie_comercial ?? '' }}
                            </td>

                            <td style="padding:8px;text-align:center;">
                                {{ $linea->frescura ?: '-' }}
                            </td>

                            <td style="padding:8px;text-align:center;">
                                {{ $linea->calibre ?: '-' }}
                            </td>

                            <td style="padding:8px;">{{ $linea->lote }}</td>

                            <td style="padding:8px;text-align:right;">
                                {{ $linea->cantidad }}
                            </td>

                            <td style="padding:8px;">
                                {{ $linea->vendedor->nombre ?? '' }}
                            </td>

                            <td style="padding:8px;">
                                {{ $linea->comprador->nombre ?? '' }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" style="text-align:center;padding:20px;">
                                Sin líneas de venta.
                            </td>
                        </tr>

                    @endforelse

                </table>

            </div>

        </div>

    @empty

        <div style="background:white;padding:30px;border-radius:14px;text-align:center;box-shadow:0 8px 25px rgba(0,0,0,.05);">
            No hay ventas registradas.
        </div>

    @endforelse

    @if(session('descargar_zip'))

        <iframe
            src="{{ route('ventas.descargarXML', session('descargar_zip')) }}"
            style="display:none;">
        </iframe>

    @endif
@endsection
