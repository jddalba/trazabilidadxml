@extends('layouts.app')

@section('content')

    <h2>Editar Balsa</h2>

    <form method="POST" action="{{ route('balsas.update',$balsa->id) }}">

        @csrf
        @method('PUT')

        <label>Nombre</label>
        <br>
        <input type="text" name="nombre" value="{{ $balsa->nombre }}">

        <br><br>

        <label>Instalación</label>
        <br>

        <select name="instalacion_id">

            @foreach($instalaciones as $i)
                <option value="{{ $i->id }}" {{ $balsa->instalacion_id == $i->id ? 'selected' : '' }}>
                    {{ $i->nombre }}
                </option>
            @endforeach

        </select>

        <br><br>

        <button type="submit">Actualizar</button>

    </form>

@endsection
