@extends('layouts.app')

@section('content')

    <h2>Editar Conservación</h2>

    <form method="POST" action="{{ route('conservaciones.update',$conservacion->id) }}">
        @csrf
        @method('PUT')
        <label>Código</label>
        <br>
        <input type="text" name="codigo" value="{{ $conservacion->codigo }}">
        <br><br>
        <label>Descripción</label>
        <br>
        <input type="text" name="descripcion" value="{{ $conservacion->descripcion }}">
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
@endsection
