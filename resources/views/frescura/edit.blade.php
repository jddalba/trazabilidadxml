@extends('layouts.app')

@section('content')

    <h2>Editar Frescura</h2>

    <form method="POST" action="{{ route('frescura.update',$frescura->id) }}">

        @csrf
        @method('PUT')

        <label>Código</label>
        <br>
        <input type="text" name="codigo" value="{{ $frescura->codigo }}">

        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
