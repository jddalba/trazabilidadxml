@extends('layouts.app')

@section('content')

    <h1 style="margin-bottom:25px;">Editar Método Conservación</h1>

    <form method="POST" action="{{ route('conservaciones.update',$conservacion->id) }}">

        @csrf
        @method('PUT')

        <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
        gap:18px;
    ">

            <div>
                <label>Código</label>
                <input type="text"
                       name="codigo"
                       value="{{ $conservacion->codigo }}">
            </div>

            <div>
                <label>Descripción</label>
                <input type="text"
                       name="descripcion"
                       value="{{ $conservacion->descripcion }}">
            </div>

        </div>

        <div style="
        display:flex;
        gap:10px;
        flex-wrap:wrap;
        margin-top:25px;
    ">

            <button type="submit" style="background:#16a34a;">
                Actualizar
            </button>

            <a href="{{ route('conservaciones.index') }}"
               class="btn"
               style="background:#6b7280;">
                Volver
            </a>

        </div>

    </form>

@endsection
