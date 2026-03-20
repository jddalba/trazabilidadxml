@extends('layouts.app')

@section('content')

    <h2>Nueva especie maestra</h2>

    <form method="POST" action="{{ route('especies-maestra.store') }}">

        @csrf

        <label>Nombre Comercial</label>
        <br>
        <input type="text" name="nombre_comercial">
        <br><br>

        <label>Nombre Científico</label>
        <br>
        <input type="text" name="nombre_cientifico">
        <br><br>

        <label>Código AL3</label>
        <br>
        <input type="text" name="codigo_al3">
        <br><br>

        <button type="submit">Guardar</button>

    </form>

@endsection
