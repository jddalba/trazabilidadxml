@extends('layouts.app')

@section('content')

    <h2>Nueva especie maestra</h2>

    <form method="POST" action="{{ route('paises.store') }}">

        @csrf

        <label>Nombre País</label>
        <br>
        <input type="text" name="nombre">
        <br><br>

        <label>Nombre AL3</label>
        <br>
        <input type="text" name="codigo_al3">
        <br><br>

        <button type="submit">Guardar</button>

    </form>

@endsection
