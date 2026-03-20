@extends('layouts.app')

@section('content')

    <h2>Editar Método</h2>

    <form method="POST" action="{{ route('metodos-produccion.update',$metodo->id) }}">
        @csrf
        @method('PUT')
        <label>Descripción</label>
        <br>
        <input type="text" name="descripcion" value="{{ $metodo->descripcion }}">
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
@endsection
