@extends('layouts.app')

@section('content')

    <h2>Editar Presentación</h2>

    <form method="POST" action="{{ route('presentaciones.update',$presentacion->id) }}">

        @csrf
        @method('PUT')

        <label>Código</label>
        <br>
        <input type="text" name="codigo" value="{{ $presentacion->codigo }}">

        <br><br>

        <label>Descripción</label>
        <br>
        <input type="text" name="descripcion" value="{{ $presentacion->descripcion }}">

        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
