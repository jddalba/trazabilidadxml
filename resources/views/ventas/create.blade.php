@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom:25px;">Nueva Venta</h2>

    <form method="POST" action="{{ route('ventas.store') }}">
        @csrf

        {{-- CABECERA --}}
        <div style="
        background:white;
        padding:22px;
        border-radius:14px;
        box-shadow:0 8px 25px rgba(0,0,0,0.05);
        margin-bottom:25px;
        max-width:320px;
    ">

            <h3 style="margin-bottom:15px; color:#1565c0;">Datos Generales</h3>

            <label>Fecha</label>

            <input
                type="date"
                name="fecha"
                required
            >

        </div>

        {{-- TITULO LINEAS --}}
        <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:18px;
        gap:15px;
        flex-wrap:wrap;
    ">

            <h3 style="margin:0; color:#1565c0;">Líneas de Venta</h3>

            <button type="button"
                    onclick="addLinea()"
                    style="
                    background:#1565c0;
                    color:white;
                    border:none;
                    padding:10px 14px;
                    border-radius:8px;
                    cursor:pointer;
                    font-size:13px;
                    font-weight:bold;
                ">
                + Añadir línea
            </button>

        </div>

        <div id="lineas">

            <div class="linea" style="
            background:white;
            padding:22px;
            border-radius:14px;
            box-shadow:0 8px 25px rgba(0,0,0,0.05);
            margin-bottom:20px;
        ">

                <h4 style="margin-bottom:18px; color:#0f172a;">Línea 1</h4>

                <div style="
                display:grid;
                grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
                gap:16px;
            ">

                    <div>
                        <label>Instalación</label>
                        <select name="lineas[0][instalacion_id]">
                            @foreach($instalaciones as $i)
                                <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Especie</label>
                        <select name="lineas[0][especie_id]" class="especie-select">
                            @foreach($especies as $e)
                                <option value="{{ $e->id }}">
                                    {{ $e->especie_comercial }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Lote</label>
                        <input type="text" name="lineas[0][lote]">
                    </div>

                    <div>
                        <label>Cantidad</label>
                        <input type="number" step="0.01" name="lineas[0][cantidad]">
                    </div>

                    <div class="extra-campos" style="grid-column:1/-1;"></div>

                    <div>
                        <label>Vendedor</label>
                        <select name="lineas[0][vendedor_id]">
                            @foreach($vendedores as $v)
                                <option value="{{ $v->id }}">{{ $v->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Comprador</label>
                        <select name="lineas[0][comprador_id]">
                            @foreach($compradores as $c)
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>

        </div>

        <div style="margin-top:25px; display:flex; gap:10px;">

            <button type="submit"
                    style="
                    background:#059669;
                    color:white;
                    border:none;
                    padding:12px 20px;
                    border-radius:10px;
                    cursor:pointer;
                    font-size:14px;
                    font-weight:bold;
                ">
                Guardar Venta
            </button>

            <a href="{{ route('ventas.index') }}"
               style="
                background:#64748b;
                color:white;
                padding:12px 20px;
                border-radius:10px;
                text-decoration:none;
                font-size:14px;
                font-weight:bold;
           ">
                Volver
            </a>

        </div>

    </form>

    {{-- TEMPLATE --}}
    <div id="template-linea" style="display:none;">

        <div class="linea" style="
        background:white;
        padding:22px;
        border-radius:14px;
        box-shadow:0 8px 25px rgba(0,0,0,0.05);
        margin-bottom:20px;
    ">

            <h4 style="margin-bottom:18px; color:#0f172a;">Nueva Línea</h4>

            <div style="
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:16px;
        ">

                <div>
                    <label>Instalación</label>
                    <select name="__NAME__[instalacion_id]">
                        @foreach($instalaciones as $i)
                            <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Especie</label>
                    <select name="__NAME__[especie_id]" class="especie-select">
                        @foreach($especies as $e)
                            <option value="{{ $e->id }}">{{ $e->especie_comercial }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Lote</label>
                    <input type="text" name="__NAME__[lote]">
                </div>

                <div>
                    <label>Cantidad</label>
                    <input type="number" step="0.01" name="__NAME__[cantidad]">
                </div>

                <div class="extra-campos" style="grid-column:1/-1;"></div>

                <div>
                    <label>Vendedor</label>
                    <select name="__NAME__[vendedor_id]">
                        @foreach($vendedores as $v)
                            <option value="{{ $v->id }}">{{ $v->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Comprador</label>
                    <select name="__NAME__[comprador_id]">
                        @foreach($compradores as $c)
                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

        </div>

    </div>

    <script>

        let index = 1;

        function addLinea(){

            let template = document.getElementById('template-linea').innerHTML;
            template = template.replace(/__NAME__/g, `lineas[${index}]`);

            document.getElementById('lineas').insertAdjacentHTML('beforeend', template);

            index++;
        }

        document.addEventListener('change', function(e){

            if(!e.target.classList.contains('especie-select')) return;

            const linea = e.target.closest('.linea');
            const texto = e.target.options[e.target.selectedIndex].text.toUpperCase();

            const requiere =
                texto.includes('ALBUR') ||
                texto.includes('MUGIL') ||
                texto.includes('LENGUADO');

            const contenedor = linea.querySelector('.extra-campos');

            if(requiere){

                contenedor.innerHTML = `
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">

            <div>
                <label>Frescura</label>
                <select name="${e.target.name.replace('especie_id','frescura')}">
                    @foreach($frescuras as $f)
                <option value="{{ $f->codigo }}">{{ $f->codigo }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Calibre</label>
                <select name="${e.target.name.replace('especie_id','calibre')}">
                    <option value="">-- Calibre --</option>
                    @foreach($calibres as $c)
                <option value="{{ $c->codigo }}">{{ $c->codigo }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        `;

            } else {

                contenedor.innerHTML = '';

            }

        });

    </script>

@endsection
