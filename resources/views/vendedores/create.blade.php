@extends('layouts.app')

@section('content')

    <h2>Nuevo vendedor</h2>

    <form method="POST" action="{{ route('vendedores.store') }}">

        @csrf

        <label>Nombre</label>
        <br>
        <input type="text" name="nombre">
        <br><br>

        <label>Tipo documento</label>
        <select name="tipo_documento">
            <option value="1">NIF</option>
            <option value="2">CIF</option>
            <option value="3">NIE</option>
        </select>

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
