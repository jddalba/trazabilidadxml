@extends('layouts.app')

@section('content')

    <h2>Editar especie maestra</h2>

    <form method="POST" action="{{ route('especies-maestra.update',$especie->id) }}">

        @csrf
        @method('PUT')

        <label>Nombre Comercial</label>
        <br>
        <input type="text" name="nombre_comercial" value="{{ $especie->nombre_comercial }}">
        <br><br>

        <label>Nombre Científico</label>
        <br>
        <input type="text" name="nombre_cientifico" value="{{ $especie->nombre_cientifico }}">
        <br><br>

        <label>Código AL3</label>
        <br>
        <input type="text" name="codigo_al3" value="{{ $especie->codigo_al3 }}">
        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
