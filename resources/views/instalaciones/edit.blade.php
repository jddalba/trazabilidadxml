<h1>Editar Instalación</h1>

<form method="POST" action="{{ route('instalaciones.update',$instalacion->id) }}">

    @csrf
    @method('PUT')

    <label>Nombre</label>
    <br>
    <input type="text" name="nombre" value="{{ $instalacion->nombre }}">
    <br><br>

    <label>Código REGA</label>
    <br>
    <input type="text" name="codigo_rega" value="{{ $instalacion->codigo_rega }}">
    <br><br>

    <label>Establecimiento Venta</label>
    <br>
    <input type="text" name="establecimiento_venta" value="{{ $instalacion->establecimiento_venta }}">
    <br><br>

    <button type="submit">Actualizar</button>

</form>

<br>

<a href="{{ route('instalaciones.index') }}">Volver</a>
