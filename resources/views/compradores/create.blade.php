@extends('layouts.app')

@section('content')

    <h2>Nuevo Comprador</h2>

    <form method="POST" action="{{ route('compradores.store') }}">

        @csrf

        <label>Nombre</label>
        <br>
        <input type="text" name="nombre">
        <br><br>

        <label>NIF</label>
        <br>
        <input type="text" name="nif">
        <br><br>

        <label>Dirección</label>
        <br>
        <input type="text" name="direccion">
        <br><br>

        <button type="submit">Guardar</button>

    </form>

@endsection
