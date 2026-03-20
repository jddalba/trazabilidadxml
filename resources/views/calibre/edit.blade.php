@extends('layouts.app')

@section('content')

    <h2>Editar Calibre</h2>

    <form method="POST" action="{{ route('calibres.update',$calibre->id) }}">

        @csrf
        @method('PUT')

        <label>Código</label>
        <br>
        <input type="text" name="codigo" value="{{ $calibre->codigo }}">

        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
