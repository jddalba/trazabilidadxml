@extends('layouts.app')

@section('content')

    <h2>Nueva Conservación</h2>

    <form method="POST" action="{{ route('conservaciones.store') }}">
        @csrf
        <label>Código</label>
        <br>
        <input type="text" name="codigo">
        <br><br>
        <label>Descripción</label>
        <br>
        <input type="text" name="descripcion">
        <br><br>
        <button type="submit">Guardar</button>
    </form>
@endsection
