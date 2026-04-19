@extends('layouts.app')

@section('content')

    <div style="
max-width:700px;
margin:auto;
">

        <h1 style="
    margin:0 0 25px 0;
    ">
            Editar Balsa
        </h1>

        <form method="POST" action="{{ route('balsas.update',$balsa->id) }}">

            @csrf
            @method('PUT')

            <label>Nombre</label>

            <input type="text"
                   name="nombre"
                   value="{{ old('nombre', $balsa->nombre) }}"
                   required>

            <label>Instalación</label>

            <select name="instalacion_id" required>

                @foreach($instalaciones as $i)

                    <option value="{{ $i->id }}"
                        {{ $balsa->instalacion_id == $i->id ? 'selected' : '' }}>
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

                <button type="submit" class="btn btn-success">
                    Actualizar
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
