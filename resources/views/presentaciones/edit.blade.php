@extends('layouts.app')

@section('content')

    <h2 style="margin-bottom:25px;">Editar Presentación</h2>

    <div style="max-width:550px;">

        <form method="POST" action="{{ route('presentaciones.update',$presentacion->id) }}">

            @csrf
            @method('PUT')

            <div style="margin-bottom:18px;">

                <label>Código</label>

                <input
                    type="text"
                    name="codigo"
                    value="{{ old('codigo', $presentacion->codigo) }}"
                    required
                >

            </div>

            <div style="margin-bottom:18px;">

                <label>Descripción</label>

                <input
                    type="text"
                    name="descripcion"
                    value="{{ old('descripcion', $presentacion->descripcion) }}"
                    required
                >

            </div>

            <div style="display:flex; gap:10px; margin-top:25px;">

                <button type="submit"
                        style="
                        background:#059669;
                        color:white;
                        border:none;
                        padding:12px 18px;
                        border-radius:8px;
                        cursor:pointer;
                        font-weight:bold;
                    ">
                    Actualizar
                </button>

                <a href="{{ route('presentaciones.index') }}"
                   style="
                    background:#64748b;
                    color:white;
                    padding:12px 18px;
                    border-radius:8px;
                    text-decoration:none;
                    font-weight:bold;
               ">
                    Volver
                </a>

            </div>

        </form>

    </div>

@endsection
