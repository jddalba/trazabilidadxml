@extends('layouts.app')

@section('content')

    <h2>Editar Paises_muestra</h2>

    <form method="POST" action="{{ route('paises.update',$pais->id) }}">

        @csrf
        @method('PUT')

        <label>Nombre País</label>
        <br>
        <input type="text" name="nombre" value="{{ $pais->nombre }}">
        <br><br>

        <label>Nombre AL3</label>
        <br>
        <input type="text" name="codigo_al3" value="{{ $pais->codigo_al3 }}">
        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
