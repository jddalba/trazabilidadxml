@extends('layouts.app')

@section('content')

    <h2>Nueva Frescura</h2>

    <form method="POST" action="{{ route('frescura.store') }}">

        @csrf

        <label>Código</label>
        <br>
        <input type="text" name="codigo">

        <br><br>

        <button type="submit">Guardar</button>

    </form>

@endsection
