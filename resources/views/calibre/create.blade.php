@extends('layouts.app')

@section('content')

    <h2>Nuevo Calibre</h2>

    <form method="POST" action="{{ route('calibres.store') }}">

        @csrf

        <label>Código</label>
        <br>
        <input type="text" name="codigo">

        <br><br>
        <button type="submit">Guardar</button>

    </form>

@endsection
