@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom:22px;">Nueva Venta</h2>

    <form method="POST" action="{{ route('ventas.store') }}">
        @csrf

        <div style="background:white;padding:18px;border-radius:14px;box-shadow:0 8px 25px rgba(0,0,0,.05);margin-bottom:22px;max-width:260px;">

            <div style="font-size:18px;font-weight:bold;color:#1565c0;margin-bottom:12px;">
                Datos Generales
            </div>

            <label style="font-size:13px;">Fecha</label>

            <input type="date"
                   name="fecha"
                   required
                   style="width:100%;padding:9px;border:1px solid #cbd5e1;border-radius:8px;margin-top:6px;">

        </div>

        <div style="margin-bottom:14px;">
            <h3 style="margin:0;color:#1565c0;">Líneas de Venta</h3>
        </div>

        <div id="lineas">

            {{-- LINEA 1 --}}
            <div class="linea" style="background:white;padding:14px;border-radius:14px;box-shadow:0 8px 25px rgba(0,0,0,.05);margin-bottom:14px;position:relative;">

                <button type="button"
                        onclick="eliminarLinea(this)"
                        style="position:absolute;top:10px;right:10px;width:34px;height:34px;border:none;background:#dc2626;color:white;border-radius:8px;cursor:pointer;font-size:18px;font-weight:bold;display:flex;align-items:center;justify-content:center;">
                    ×
                </button>

                <div style="font-weight:bold;font-size:14px;margin-bottom:12px;color:#0f172a;">
                    Línea 1
                </div>

                <div style="
    display:grid;
    grid-template-columns:1.7fr 1.7fr .9fr .9fr 1.7fr 1.7fr;
    gap:10px;
    align-items:end;
    ">

                    <div>
                        <label style="font-size:12px;">Instalación</label>
                        <select name="lineas[0][instalacion_id]" style="width:100%;">
                            @foreach($instalaciones as $i)
                                <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label style="font-size:12px;">Especie</label>
                        <select name="lineas[0][especie_id]" class="especie-select" style="width:100%;">
                            @foreach($especies as $e)
                                <option value="{{ $e->id }}">{{ $e->especie_comercial }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label style="font-size:12px;">Lote</label>
                        <input type="text" name="lineas[0][lote]" style="width:100%;">
                    </div>

                    <div>
                        <label style="font-size:12px;">Kg</label>
                        <input type="number" step="0.01" name="lineas[0][cantidad]" style="width:100%;">
                    </div>

                    <div>
                        <label style="font-size:12px;">Vendedor</label>
                        <select name="lineas[0][vendedor_id]" style="width:100%;">
                            @foreach($vendedores as $v)
                                <option value="{{ $v->id }}">{{ $v->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label style="font-size:12px;">Comprador</label>
                        <select name="lineas[0][comprador_id]" style="width:100%;">
                            @foreach($compradores as $c)
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="extra-campos" style="margin-top:10px;"></div>

            </div>

        </div>

        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:20px;">

            <button type="button"
                    onclick="addLinea()"
                    style="background:#1565c0;color:white;border:none;padding:11px 16px;border-radius:8px;cursor:pointer;font-size:13px;font-weight:bold;">
                + Nueva línea
            </button>

            <button type="submit"
                    style="background:#059669;color:white;border:none;padding:11px 18px;border-radius:8px;cursor:pointer;font-size:13px;font-weight:bold;">
                Guardar Venta
            </button>

            <a href="{{ route('ventas.index') }}"
               style="background:#64748b;color:white;padding:11px 18px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:bold;">
                Volver
            </a>

        </div>

    </form>

    {{-- TEMPLATE --}}
    <div id="template-linea" style="display:none;">

        <div class="linea" style="background:white;padding:14px;border-radius:14px;box-shadow:0 8px 25px rgba(0,0,0,.05);margin-bottom:14px;position:relative;">

            <button type="button"
                    onclick="eliminarLinea(this)"
                    style="position:absolute;top:10px;right:10px;width:34px;height:34px;border:none;background:#dc2626;color:white;border-radius:8px;cursor:pointer;font-size:18px;font-weight:bold;display:flex;align-items:center;justify-content:center;">
                ×
            </button>

            <div style="font-weight:bold;font-size:14px;margin-bottom:12px;color:#0f172a;">
                Nueva Línea
            </div>

            <div style="
    display:grid;
    grid-template-columns:1.7fr 1.7fr .9fr .9fr 1.7fr 1.7fr;
    gap:10px;
    align-items:end;
    ">

                <div>
                    <label style="font-size:12px;">Instalación</label>
                    <select name="__NAME__[instalacion_id]" style="width:100%;">
                        @foreach($instalaciones as $i)
                            <option value="{{ $i->id }}">{{ $i->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="font-size:12px;">Especie</label>
                    <select name="__NAME__[especie_id]" class="especie-select" style="width:100%;">
                        @foreach($especies as $e)
                            <option value="{{ $e->id }}">{{ $e->especie_comercial }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="font-size:12px;">Lote</label>
                    <input type="text" name="__NAME__[lote]" style="width:100%;">
                </div>

                <div>
                    <label style="font-size:12px;">Kg</label>
                    <input type="number" step="0.01" name="__NAME__[cantidad]" style="width:100%;">
                </div>

                <div>
                    <label style="font-size:12px;">Vendedor</label>
                    <select name="__NAME__[vendedor_id]" style="width:100%;">
                        @foreach($vendedores as $v)
                            <option value="{{ $v->id }}">{{ $v->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="font-size:12px;">Comprador</label>
                    <select name="__NAME__[comprador_id]" style="width:100%;">
                        @foreach($compradores as $c)
                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="extra-campos" style="margin-top:10px;"></div>

        </div>

    </div>

    <script>
        let index = 1;

        function addLinea(){
            let template = document.getElementById('template-linea').innerHTML;
            template = template.replace(/__NAME__/g, `lineas[${index}]`);
            document.getElementById('lineas').insertAdjacentHTML('beforeend', template);
            index++;

            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        }

        function eliminarLinea(btn){
            const total = document.querySelectorAll('.linea').length;

            if(total <= 1){
                alert('Debe quedar al menos una línea.');
                return;
            }

            btn.closest('.linea').remove();
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
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:10px;">
            <div>
                <label style="font-size:12px;">Frescura</label>
                <select name="${e.target.name.replace('especie_id','frescura')}" style="width:100%;">
                    <option value="">--</option>
                    @foreach($frescuras as $f)
                <option value="{{ $f->codigo }}">{{ $f->codigo }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label style="font-size:12px;">Calibre</label>
                <select name="${e.target.name.replace('especie_id','calibre')}" style="width:100%;">
                    <option value="">--</option>
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
