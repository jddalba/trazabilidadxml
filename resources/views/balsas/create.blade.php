@extends('layouts.app')

@section('content')

    <h2>Nueva Balsa</h2>

    <form method="POST" action="{{ route('balsas.store') }}">

        @csrf

        <label>Nombre</label>
        <br>
        <input type="text" name="nombre">

        <br><br>

        <label>Instalación</label>
        <br>

        <select name="instalacion_id">

            @foreach($instalaciones as $i)
                <option value="{{ $i->id }}">{{ $i->nombre }}</option>
            @endforeach

        </select>

        <br><br>

        <button type="submit">Guardar</button>

    </form>

@endsection
