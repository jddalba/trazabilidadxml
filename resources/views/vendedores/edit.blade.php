@extends('layouts.app')

@section('content')

    <h2>Editar vendedor</h2>

    <form method="POST" action="{{ route('vendedores.update',$vendedor->id) }}">

        @csrf
        @method('PUT')

        <label>Nombre</label>
        <br>
        <input type="text" name="nombre" value="{{ $vendedor->nombre }}">
        <br><br>

        <label>NIF</label>
        <br>
        <input type="text" name="nif" value="{{ $vendedor->nif }}">
        <br><br>

        <label>Dirección</label>
        <br>
        <input type="text" name="direccion" value="{{ $vendedor->direccion }}">
        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
