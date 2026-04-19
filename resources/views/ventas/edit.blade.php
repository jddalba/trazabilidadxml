@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom:25px;">Editar Venta</h2>

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

    <form method="POST" action="{{ route('ventas.update', $venta->id) }}">

        @csrf
        @method('PUT')

        <div style="
        background:white;
        padding:20px;
        border-radius:14px;
        box-shadow:0 8px 25px rgba(0,0,0,0.05);
        margin-bottom:25px;
        max-width:320px;
    ">

            <label>Fecha</label>

            <input
                type="date"
                name="fecha"
                value="{{ $venta->fecha }}"
                required
            >

        </div>

        <div id="lineas">

            @foreach($venta->lineas as $index => $linea)

                @php
                    $nombre = strtoupper($linea->especie->especie_comercial ?? '');
                    $requiere = str_contains($nombre, 'ALBUR') || str_contains($nombre, 'MUGIL') || str_contains($nombre, 'LENGUADO');
                @endphp

                <div style="
                background:white;
                padding:22px;
                border-radius:14px;
                box-shadow:0 8px 25px rgba(0,0,0,0.05);
                margin-bottom:22px;
            ">

                    <h3 style="margin-bottom:18px; color:#1565c0;">
                        Línea {{ $loop->iteration }}
                    </h3>

                    <div style="
                    display:grid;
                    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
                    gap:16px;
                ">

                        <div>
                            <label>Instalación</label>
                            <select name="lineas[{{ $index }}][instalacion_id]">
                                @foreach($instalaciones as $i)
                                    <option value="{{ $i->id }}" {{ $linea->instalacion_id == $i->id ? 'selected' : '' }}>
                                        {{ $i->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Especie</label>
                            <select name="lineas[{{ $index }}][especie_id]">
                                @foreach($especies as $e)
                                    <option value="{{ $e->id }}" {{ $linea->especie_id == $e->id ? 'selected' : '' }}>
                                        {{ $e->especie_comercial }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Lote</label>
                            <input type="text"
                                   name="lineas[{{ $index }}][lote]"
                                   value="{{ $linea->lote }}">
                        </div>

                        <div>
                            <label>Cantidad</label>
                            <input type="number"
                                   step="0.01"
                                   name="lineas[{{ $index }}][cantidad]"
                                   value="{{ $linea->cantidad }}">
                        </div>

                        <div>
                            <label>Vendedor</label>
                            <select name="lineas[{{ $index }}][vendedor_id]">
                                @foreach($vendedores as $v)
                                    <option value="{{ $v->id }}" {{ $linea->vendedor_id == $v->id ? 'selected' : '' }}>
                                        {{ $v->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label>Comprador</label>
                            <select name="lineas[{{ $index }}][comprador_id]">
                                @foreach($compradores as $c)
                                    <option value="{{ $c->id }}" {{ $linea->comprador_id == $c->id ? 'selected' : '' }}>
                                        {{ $c->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if($requiere)

                            <div>
                                <label>Frescura</label>
                                <select name="lineas[{{ $index }}][frescura]">
                                    @foreach($frescuras as $f)
                                        <option value="{{ $f->codigo }}"
                                            {{ ($linea->frescura ?? 'E') == $f->codigo ? 'selected' : '' }}>
                                            {{ $f->codigo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label>Calibre</label>
                                <select name="lineas[{{ $index }}][calibre]">
                                    <option value="">-- Calibre --</option>
                                    @foreach($calibres as $c)
                                        <option value="{{ $c->codigo }}"
                                            {{ $linea->calibre == $c->codigo ? 'selected' : '' }}>
                                            {{ $c->codigo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

        <div style="display:flex; gap:10px; margin-top:25px;">

            <button type="submit"
                    style="
                    background:#059669;
                    color:white;
                    border:none;
                    padding:12px 18px;
                    border-radius:8px;
                    cursor:pointer;
                    font-weight:bold;
                ">
                Actualizar Venta
            </button>

            <a href="{{ route('ventas.index') }}"
               style="
                background:#64748b;
                color:white;
                padding:12px 18px;
                border-radius:8px;
                text-decoration:none;
                font-weight:bold;
           ">
                Volver
            </a>

        </div>

    </form>

@endsection
