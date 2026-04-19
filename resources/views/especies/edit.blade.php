@extends('layouts.app')

@section('content')

    <h1 style="margin-bottom:25px;">Editar Especie</h1>

    @if ($errors->any())
        <div style="
        background:#fee2e2;
        color:#991b1b;
        padding:15px;
        border-radius:10px;
        margin-bottom:20px;
    ">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('especies.update', $especie->id) }}">

        @csrf
        @method('PUT')

        <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
        gap:18px;
    ">

            <div>
                <label>Código</label>
                <input type="text"
                       name="codigo"
                       value="{{ old('codigo', $especie->codigo) }}"
                       required>
            </div>

            <div>
                <label>Especie Comercial</label>
                <select name="especie_maestra_id" id="especie_select" required>
                    <option value="">-- Selecciona Especie --</option>

                    @foreach($especies_maestras as $e)
                        <option
                            value="{{ $e->id }}"
                            data-cientifico="{{ $e->nombre_cientifico }}"
                            data-al3="{{ $e->codigo_al3 }}"
                            {{ $especie->especie_al3 == $e->codigo_al3 ? 'selected' : '' }}>
                            {{ $e->nombre_comercial }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Especie Científica</label>
                <input type="text"
                       id="cientifico"
                       value="{{ $especie->especie_cientifica }}"
                       readonly
                       style="background:#f1f5f9;">
            </div>

            <div>
                <label>Especie AL3</label>
                <input type="text"
                       id="al3"
                       value="{{ $especie->especie_al3 }}"
                       readonly
                       style="background:#f1f5f9;">
            </div>

            <div>
                <label>País</label>
                <select name="pais_al3">
                    <option value="">-- Selecciona País --</option>

                    @foreach($paises as $p)
                        <option value="{{ $p->codigo_al3 }}"
                            {{ $especie->pais_al3 == $p->codigo_al3 ? 'selected' : '' }}>
                            {{ $p->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Método Producción</label>
                <select name="metodo_produccion">
                    <option value="">-- Selecciona Método --</option>

                    @foreach($metodos as $m)
                        <option value="{{ $m->id }}"
                            {{ $especie->metodo_produccion == $m->id ? 'selected' : '' }}>
                            {{ $m->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Conservación</label>
                <select name="cod_conservacion">
                    <option value="">-- Selecciona --</option>

                    @foreach($conservaciones as $c)
                        <option value="{{ $c->codigo }}"
                            {{ $especie->cod_conservacion == $c->codigo ? 'selected' : '' }}>
                            {{ $c->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Presentación</label>
                <select name="cod_presentacion">
                    <option value="">-- Selecciona --</option>

                    @foreach($presentaciones as $p)
                        <option value="{{ $p->codigo }}"
                            {{ $especie->cod_presentacion == $p->codigo ? 'selected' : '' }}>
                            {{ $p->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Frescura</label>
                <select name="cod_frescura">
                    <option value="">-- Selecciona --</option>

                    @foreach($frescura as $f)
                        <option value="{{ $f->codigo }}"
                            {{ $especie->cod_frescura == $f->codigo ? 'selected' : '' }}>
                            {{ $f->codigo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Calibre</label>
                <select name="cod_calibre">
                    <option value="">-- Selecciona --</option>

                    @foreach($calibres as $c)
                        <option value="{{ $c->codigo }}"
                            {{ $especie->cod_calibre == $c->codigo ? 'selected' : '' }}>
                            {{ $c->codigo }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div style="
        display:flex;
        gap:10px;
        flex-wrap:wrap;
        margin-top:25px;
    ">

            <button type="submit" style="background:#16a34a;">
                Actualizar
            </button>

            <a href="{{ route('especies.index') }}"
               class="btn"
               style="background:#6b7280;">
                Volver
            </a>

        </div>

    </form>

    <script>
        document.getElementById('especie_select').addEventListener('change', function () {

            let selected = this.options[this.selectedIndex];

            if(selected.value == ''){
                document.getElementById('cientifico').value = '';
                document.getElementById('al3').value = '';
                return;
            }

            document.getElementById('cientifico').value = selected.dataset.cientifico;
            document.getElementById('al3').value = selected.dataset.al3;

        });
    </script>

@endsection
