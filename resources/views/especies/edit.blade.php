<h1>Editar especie</h1>

<form method="POST" action="{{ route('especies.update', $especie->id) }}">

    @csrf
    @method('PUT')

    <label>Código</label>
    <br>
    <input type="text" name="codigo" value="{{ $especie->codigo }}">
    <br><br>

    <label>Especie Comercial</label>
    <br>
    <input type="text" name="especie_comercial" value="{{ $especie->especie_comercial }}">
    <br><br>

    <label>Especie Científica</label>
    <br>
    <input type="text" name="especie_cientifica" value="{{ $especie->especie_cientifica }}">
    <br><br>

    <label>Especie AL3</label>
    <br>
    <input type="text" name="especie_al3" value="{{ $especie->especie_al3 }}">
    <br><br>

    <label>País AL3</label>
    <br>
    <input type="text" name="pais_al3" value="{{ $especie->pais_al3 }}">
    <br><br>

    <label>Método de Producción</label>
    <br>
    <input type="text" name="metodo_produccion" value="{{ $especie->metodo_produccion }}">
    <br><br>

    <label>Código Especie Conservación</label>
    <br>
    <input type="text" name="cod_conservacion" value="{{ $especie->cod_conservacion }}">
    <br><br>

    <label>Código Especie Presentación</label>
    <br>
    <input type="text" name="cod_presentacion" value="{{ $especie->cod_presentacion }}">
    <br><br>

    <label>Código Especie Frescura</label>
    <br>
    <input type="text" name="cod_frescura" value="{{ $especie->cod_frescura }}">
    <br><br>

    <label>Código Especie Calibre</label>
    <br>
    <input type="text" name="cod_calibre" value="{{ $especie->cod_calibre }}">
    <br><br>

    <button type="submit">Actualizar</button>

</form>

<br>

<a href="{{ route('especies.index') }}">Volver</a>
