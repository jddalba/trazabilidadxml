@extends('layouts.app')

@section('content')

    <h2>Nuevo Método de Producción</h2>

    <form method="POST" action="{{ route('metodos-produccion.store') }}">

        @csrf

        <label>Descripción</label>
        <br>

        <input type="text" name="descripcion">

        <br><br>

        <button type="submit">Guardar</button>

    </form>

@endsection
