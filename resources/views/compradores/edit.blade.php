@extends('layouts.app')

@section('content')

    <div style="
max-width:700px;
margin:auto;
">

        <h1 style="
    margin:0 0 25px 0;
    ">
            Editar Comprador
        </h1>

        <form method="POST" action="{{ route('compradores.update',$compradores->id) }}">

            @csrf
            @method('PUT')

            <label>Nombre</label>

            <input type="text"
                   name="nombre"
                   value="{{ old('nombre', $compradores->nombre) }}"
                   required>

            <label>NIF</label>

            <input type="text"
                   name="nif"
                   value="{{ old('nif', $compradores->nif) }}"
                   required>

            <label>Dirección</label>

            <input type="text"
                   name="direccion"
                   value="{{ old('direccion', $compradores->direccion) }}"
                   required>

            <div style="
        display:flex;
        gap:10px;
        flex-wrap:wrap;
        margin-top:10px;
        ">

                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('compradores.index') }}"
                   class="btn"
                   style="background:#64748b;">
                    Volver
                </a>

            </div>

        </form>

    </div>

@endsection
