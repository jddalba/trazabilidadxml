@extends('layouts.app')

@section('content')

    <h2>Editar Comprador</h2>

    <form method="POST" action="{{ route('compradores.update',$compradores->id) }}">

        @csrf
        @method('PUT')

        <label>Nombre</label>
        <br>
        <input type="text" name="nombre" value="{{ $compradores->nombre }}">
        <br><br>

        <label>NIF</label>
        <br>
        <input type="text" name="nif" value="{{ $compradores->nif }}">
        <br><br>

        <label>Dirección</label>
        <br>
        <input type="text" name="direccion" value="{{ $compradores->direccion }}">
        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
