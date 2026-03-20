@extends('layouts.app')

@section('content')
    <h2>Nueva instalación</h2>

    <form method="POST" action="{{ route('instalaciones.store') }}">


        @csrf

        <label>Nombre</label>
        <br>
        <input type="text" name="nombre">
        <br><br>

        <label>Código REGA</label>
        <br>
        <input type="text" name="codigo_rega">
        <br><br>

        <label>Establecimiento Venta</label>
        <br>
        <input type="text" name="establecimiento_venta">
        <br><br>

        <button type="submit">Guardar</button>

    </form>

    <br>

    <a href="{{ route('instalaciones.index') }}">Volver</a>
@endsection
