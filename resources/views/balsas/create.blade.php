@extends('layouts.app')

@section('content')

    <div style="
max-width:700px;
margin:auto;
">

        <h1 style="
    margin:0 0 25px 0;
    ">
            Nueva Balsa
        </h1>

        <form method="POST" action="{{ route('balsas.store') }}">

            @csrf

            <label>Nombre</label>

            <input type="text"
                   name="nombre"
                   value="{{ old('nombre') }}"
                   required>

            <label>Instalación</label>

            <select name="instalacion_id" required>

                @foreach($instalaciones as $i)

                    <option value="{{ $i->id }}">
                        {{ $i->nombre }}
                    </option>

                @endforeach

            </select>

            <div style="
        display:flex;
        gap:10px;
        flex-wrap:wrap;
        margin-top:10px;
        ">

                <button type="submit" class="btn">
                    Guardar
                </button>

                <a href="{{ route('balsas.index') }}"
                   class="btn"
                   style="background:#64748b;">
                    Volver
                </a>

            </div>

        </form>

    </div>

@endsection
