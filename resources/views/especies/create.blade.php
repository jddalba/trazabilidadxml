@extends('layouts.app')

@section('content')
    <h2>Nueva especie</h1>

    <div style="width:500px">

        <form method="POST" action="{{ route('especies.store') }}">
            @csrf

            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input
                    type="text"
                    name="codigo"
                    id="codigo"
                    class="form-control"
                    value="{{ old('codigo') }}"
                    required
                >
                @error('codigo')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom:15px">
                <label>Especie Comercial</label>
                <br>
                <select name="especie_comercial" id="especie_select">
                    <option value="">-- Selecciona Especie --</option>
                    @foreach($especies_maestra as $e)
                        <option
                            value="{{ $e->nombre_comercial }}"
                            data-cientifico="{{ $e->nombre_cientifico }}"
                            data-al3="{{ $e->codigo_al3 }}"
                        >
                            {{ $e->nombre_comercial }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:15px">
                <label>Especie Científica</label>
                <br>
                <input type="text" name="especie_cientifica" id="cientifico" readonly>
            </div>

            <div style="margin-bottom:15px">
                <label>Especie AL3</label>
                <br>
                <input type="text" name="especie_al3" id="al3" readonly>
            </div>

            <div style="margin-bottom:15px">
                <x-select
                    name="pais_al3"
                    label="País"
                    :options="$paises"
                    valueField="codigo_al3"
                    textField="nombre"
                />
            </div>

            <div style="margin-bottom:15px">
                <label>Método Producción</label>
                <br>
                <select name="metodo_produccion" required>

                    <option value="">-- Selecciona Método --</option>

                    @foreach($metodos as $m)
                        <option value="{{ $m->codigo }}">
                            {{ $m->descripcion }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div style="margin-bottom:15px">
                <x-select
                    name="cod_conservacion"
                    label="Conservación"
                    :options="$conservaciones"
                    valueField="codigo"
                    textField="descripcion"
                />
            </div>
            <div style="margin-bottom:15px">
                <x-select
                    name="cod_presentacion"
                    label="Presentación"
                    :options="$presentaciones"
                    valueField="codigo"
                    textField="descripcion"
                />
            </div>
            <div style="margin-bottom:15px">
                <x-select
                    name="cod_frescura"
                    label="Frescura"
                    :options="$frescura"
                    valueField="codigo"
                    textField="codigo"
                />
            </div>
            <div style="margin-bottom:15px">
                <x-select
                    name="cod_calibre"
                    label="Calibre"
                    :options="$calibres"
                    valueField="codigo"
                    textField="codigo"
                />
            </div>
            <div style="margin-bottom:15px">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('especie_select').addEventListener('change', function(){
            var selected = this.options[this.selectedIndex];
            if(selected.value == ""){
                document.getElementById('cientifico').value = "";
                document.getElementById('al3').value = "";
                return;
            }
            document.getElementById('cientifico').value = selected.dataset.cientifico;
            document.getElementById('al3').value = selected.dataset.al3;
        });
    </script>
@endsection
